  $(function() {
    var dialog, editDialog, transactionDialog, form, editForm, transactionForm, num, et,
      date = $( "#datepicker" ),
      bgrh = $( "#bgrh" ),
      result = $( "#result" ),
	  medtech = $( "#medtech" ),
	  edate = $( "#edit_datepicker" ),
      ebgrh = $( "#edit_bgrh" ),
      eresult = $( "#edit_result" ),
	  emedtech = $( "#edit_medtech" ),
	  tranField = $("#transaction_number"),
      allFields = $( [] ).add( date ).add( bgrh ).add( result ).add( medtech ).add( edate ).add( ebgrh ).add( eresult ).add( emedtech ).add(tranField),
      tips = $( ".validateTips" );
 
    function updateTips( t ) {
      tips
        .text( t )
        .addClass( "ui-state-highlight" );
      setTimeout(function() {
        tips.removeClass( "ui-state-highlight", 1500 );
      }, 500 );
    }
 
    function addUser() {
	var i = <?php echo $id?>;
	var d = date.val();
	var b = bgrh.val();
	var r = result.val();
	var m = medtech.val();

      allFields.removeClass( "ui-state-error" );
       
	$.post('insert.php', {ID: i, Date: d, BGRH: b, Result: r, Medtech: m});
	        dialog.dialog( "close" );
				  	  location.reload();
    }
 
    dialog = $( "#dialog-form" ).dialog({
      autoOpen: false,
      height: 350,
      width: 350,
      modal: true,
      buttons: {
        "Save Transaction": addUser,
        Cancel: function() {
          dialog.dialog( "close" );
        }
      },
      close: function() {
        form[ 0 ].reset();
        allFields.removeClass( "ui-state-error" );
      }
    });
 
    form = dialog.find( "form" ).on( "submit", function( event ) {
      event.preventDefault();
      addUser();
    });
 
    $( "#create-user" ).button().on( "click", function() {
      dialog.dialog( "open" );
    });
	
	function editTransaction() {
		et = num;
		var ed = edate.val();
		var eb = ebgrh.val();
		var er = eresult.val();
		var em = emedtech.val();
		
		$.post('edit.php', {tranNumber: et, eDate: ed, eBGRH: eb, eResult: er, eMedtech: em});
      allFields.removeClass( "ui-state-error" );
	  editDialog.dialog( "close" );
				  	  location.reload();
	}
 
    editDialog = $( "#edit_dialog-form" ).dialog({
      autoOpen: false,
      height: 350,
      width: 350,
      modal: true,
      buttons: {
        "Update Transaction": editTransaction,
        Cancel: function() {
          editDialog.dialog( "close" );
        }
      },
      close: function() {
        editForm[ 0 ].reset();
        allFields.removeClass( "ui-state-error" );
      }
    });
 
    editForm = dialog.find( "form" ).on( "submit", function( event ) {
      event.preventDefault();
      editTransaction();
    });
	
	$( "#editButton" ).button().on( "click", function() {
		//transactionDialog.dialog( "open" );
		transactionNumberFromScript = num;
	    editDialog.dialog( "open" );
    });

	function enterTransaction() {
		transactionNumberFromScript = num;
	    editDialog.dialog( "open" );
		num = tranField.val();
		transactionDialog.dialog( "close" );
    }
 
    transactionDialog = $( "#transaction_dialog-form" ).dialog({
      autoOpen: false,
      height: 200,
      width: 350,
      modal: true,
      buttons: {
        "Continue": enterTransaction,
        Cancel: function() {
          transactionDialog.dialog( "close" );
        }
      },
      close: function() {
        transactionForm[ 0 ].reset();
        allFields.removeClass( "ui-state-error" );
      }
    });
 
    transactionForm = dialog.find( "form" ).on( "submit", function( event ) {
      event.preventDefault();
      enterTransaction();
    });
	
	});