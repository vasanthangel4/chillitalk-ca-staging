/* Set the defaults for DataTables initialisation */
$.extend( true, $.fn.dataTable.defaults, {
	"sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>",
	"sPaginationType": "bootstrap",
	"oLanguage": {
		"sLengthMenu": "_MENU_ records per page"
	},
	
} );


/* Default class modification */
$.extend( $.fn.dataTableExt.oStdClasses, {
	"sWrapper": "dataTables_wrapper form-inline"
} );


/* API method to get paging information */
$.fn.dataTableExt.oApi.fnPagingInfo = function ( oSettings )
{
	return {
		"iStart":         oSettings._iDisplayStart,
		"iEnd":           oSettings.fnDisplayEnd(),
		"iLength":        oSettings._iDisplayLength,
		"iTotal":         oSettings.fnRecordsTotal(),
		"iFilteredTotal": oSettings.fnRecordsDisplay(),
		"iPage":          oSettings._iDisplayLength === -1 ?
			0 : Math.ceil( oSettings._iDisplayStart / oSettings._iDisplayLength ),
		"iTotalPages":    oSettings._iDisplayLength === -1 ?
			0 : Math.ceil( oSettings.fnRecordsDisplay() / oSettings._iDisplayLength )
	};
};

// sINput
$.fn.dataTableExt.oPagination.input = {
    "fnInit": function ( oSettings, nPaging, fnCallbackDraw )
    {
        var nFirst = document.createElement( 'span' );
        var nPrevious = document.createElement( 'span' );
        var nNext = document.createElement( 'span' );
        var nLast = document.createElement( 'span' );
        var nInput = document.createElement( 'input' );
        var nPage = document.createElement( 'span' );
        var nOf = document.createElement( 'span' );
          
        nFirst.innerHTML = oSettings.oLanguage.oPaginate.sFirst;
        nPrevious.innerHTML = oSettings.oLanguage.oPaginate.sPrevious;
        nNext.innerHTML = oSettings.oLanguage.oPaginate.sNext;
        nLast.innerHTML = oSettings.oLanguage.oPaginate.sLast;
          
        nFirst.className = "paginate_button first";
        nPrevious.className = "paginate_button previous";
        nNext.className="paginate_button next";
        nLast.className = "paginate_button last";
        nOf.className = "paginate_of";
        nPage.className = "paginate_page";
          
        if ( oSettings.sTableId !== '' )
        {
            nPaging.setAttribute( 'id', oSettings.sTableId+'_paginate' );
            nPrevious.setAttribute( 'id', oSettings.sTableId+'_previous' );
            nPrevious.setAttribute( 'id', oSettings.sTableId+'_previous' );
            nNext.setAttribute( 'id', oSettings.sTableId+'_next' );
            nLast.setAttribute( 'id', oSettings.sTableId+'_last' );
        }
          
        nInput.type = "text";
        nInput.style.width = "15px";
        nInput.style.display = "inline";
        nPage.innerHTML = "Page ";
          
        nPaging.appendChild( nFirst );
        nPaging.appendChild( nPrevious );
        nPaging.appendChild( nPage );
        nPaging.appendChild( nInput );
        nPaging.appendChild( nOf );
        nPaging.appendChild( nNext );
        nPaging.appendChild( nLast );
          
        $(nFirst).click( function () {
            oSettings.oApi._fnPageChange( oSettings, "first" );
            fnCallbackDraw( oSettings );
        } );
          
        $(nPrevious).click( function() {
            oSettings.oApi._fnPageChange( oSettings, "previous" );
            fnCallbackDraw( oSettings );
        } );
          
        $(nNext).click( function() {
            oSettings.oApi._fnPageChange( oSettings, "next" );
            fnCallbackDraw( oSettings );
        } );
          
        $(nLast).click( function() {
            oSettings.oApi._fnPageChange( oSettings, "last" );
            fnCallbackDraw( oSettings );
        } );
          
        $(nInput).keyup( function (e) {
              
            if ( e.which == 38 || e.which == 39 )
            {
                this.value++;
            }
            else if ( (e.which == 37 || e.which == 40) && this.value > 1 )
            {
                this.value--;
            }
              
            if ( this.value == "" || this.value.match(/[^0-9]/) )
            {
                /* Nothing entered or non-numeric character */
                return;
            }
              
            var iNewStart = oSettings._iDisplayLength * (this.value - 1);
            if ( iNewStart > oSettings.fnRecordsDisplay() )
            {
                /* Display overrun */
                oSettings._iDisplayStart = (Math.ceil((oSettings.fnRecordsDisplay()-1) /
                    oSettings._iDisplayLength)-1) * oSettings._iDisplayLength;
                fnCallbackDraw( oSettings );
                return;
            }
              
            oSettings._iDisplayStart = iNewStart;
            fnCallbackDraw( oSettings );
        } );
          
        /* Take the brutal approach to cancelling text selection */
        $('span', nPaging).bind( 'mousedown', function () { return false; } );
        $('span', nPaging).bind( 'selectstart', function () { return false; } );
    },
     
     
    "fnUpdate": function ( oSettings, fnCallbackDraw )
    {
        if ( !oSettings.aanFeatures.p )
        {
            return;
        }
        var iPages = Math.ceil((oSettings.fnRecordsDisplay()) / oSettings._iDisplayLength);
        var iCurrentPage = Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength) + 1;
          
        /* Loop over each instance of the pager */
        var an = oSettings.aanFeatures.p;
        for ( var i=0, iLen=an.length ; i<iLen ; i++ )
        {
            var spans = an[i].getElementsByTagName('span');
            var inputs = an[i].getElementsByTagName('input');
            spans[3].innerHTML = " of "+iPages
            inputs[0].value = iCurrentPage;
        }
    }
};


/* Bootstrap style pagination control */
$.extend( $.fn.dataTableExt.oPagination, {
	"bootstrap-custom": {
		"fnInit": function( oSettings, nPaging, fnDraw ) {
			
			
			var oLang = oSettings.oLanguage.oPaginate;
			var fnClickHandler = function ( e ) {
				e.preventDefault();
				if ( oSettings.oApi._fnPageChange(oSettings, e.data.action) ) {
					fnDraw( oSettings );
				}
			};

			$(nPaging).addClass('pagination').append(
				'<ul>'+
					'<li class="prev disabled"><a href="#"><</a></li>'+
					'<li class="next disabled"><a href="#">></a></li>'+
				'</ul>'
			);
			var els = $('a', nPaging);
			$(els[0]).bind( 'click.DT', { action: "previous" }, fnClickHandler );
			$(els[1]).bind( 'click.DT', { action: "next" }, fnClickHandler );
			
			
			var nFirst = document.createElement( 'span' );
	        var nPrevious = document.createElement( 'span' );
	        var nNext = document.createElement( 'span' );
	        var nLast = document.createElement( 'span' );
	        var nInput = document.createElement( 'input' );
	        var nPage = document.createElement( 'span' );
	        var nOf = document.createElement( 'span' );
	          
	        nFirst.innerHTML = oSettings.oLanguage.oPaginate.sFirst;
	        nPrevious.innerHTML = oSettings.oLanguage.oPaginate.sPrevious;
	        nNext.innerHTML = oSettings.oLanguage.oPaginate.sNext;
	        nLast.innerHTML = oSettings.oLanguage.oPaginate.sLast;
	          
	        nFirst.className = "paginate_button first hide";
	        nPrevious.className = "paginate_button previous hide";
	        nNext.className="paginate_button next hide";
	        nLast.className = "paginate_button last hide";
	        nOf.className = "paginate_of";
	        nPage.className = "paginate_page";
	          
	        if ( oSettings.sTableId !== '' )
	        {
	            nPaging.setAttribute( 'id', oSettings.sTableId+'_paginate' );
	            nPrevious.setAttribute( 'id', oSettings.sTableId+'_previous' );
	            nPrevious.setAttribute( 'id', oSettings.sTableId+'_previous' );
	            nNext.setAttribute( 'id', oSettings.sTableId+'_next' );
	            nLast.setAttribute( 'id', oSettings.sTableId+'_last' );
	        }
	          
	        nInput.type = "text";
	        nInput.style.width = "10px";
	        nInput.style.height = "12px";
	        nInput.style.display = "inline";
	        nPage.innerHTML = "Go to page ";
	          
	        nPaging.appendChild( nFirst );
	        nPaging.appendChild( nPrevious );
	        nPaging.appendChild( nPage );
	        nPaging.appendChild( nInput );
	        nPaging.appendChild( nOf );
	        nPaging.appendChild( nNext );
	        nPaging.appendChild( nLast );
	          
	        $(nFirst).click( function () {
	            oSettings.oApi._fnPageChange( oSettings, "first" );
	            fnDraw( oSettings );
	        } );
	          
	        $(nPrevious).click( function() {
	            oSettings.oApi._fnPageChange( oSettings, "previous" );
	            fnDraw( oSettings );
	        } );
	          
	        $(nNext).click( function() {
	            oSettings.oApi._fnPageChange( oSettings, "next" );
	            fnDraw( oSettings );
	        } );
	          
	        $(nLast).click( function() {
	            oSettings.oApi._fnPageChange( oSettings, "last" );
	            fnDraw( oSettings );
	        } );
	          
	        $(nInput).keyup( function (e) {
	              
	            if ( e.which == 38 || e.which == 39 )
	            {
	                this.value++;
	            }
	            else if ( (e.which == 37 || e.which == 40) && this.value > 1 )
	            {
	                this.value--;
	            }
	              
	            if ( this.value == "" || this.value.match(/[^0-9]/) )
	            {
	                /* Nothing entered or non-numeric character */
	                return;
	            }
	              
	            var iNewStart = oSettings._iDisplayLength * (this.value - 1);
	            if ( iNewStart > oSettings.fnRecordsDisplay() )
	            {
	                /* Display overrun */
	                oSettings._iDisplayStart = (Math.ceil((oSettings.fnRecordsDisplay()-1) /
	                    oSettings._iDisplayLength)-1) * oSettings._iDisplayLength;
	                fnDraw( oSettings );
	                return;
	            }
	              
	            oSettings._iDisplayStart = iNewStart;
	            fnDraw( oSettings );
	        } );
	          
	        /* Take the brutal approach to cancelling text selection */
	        $('span', nPaging).bind( 'mousedown', function () { return false; } );
	        $('span', nPaging).bind( 'selectstart', function () { return false; } );
			
			
			
		},

		"fnUpdate": function ( oSettings, fnDraw ) {
			
	        
			var iListLength = 5;
			var oPaging = oSettings.oInstance.fnPagingInfo();
			var an = oSettings.aanFeatures.p;
			var i, ien, j, sClass, iStart, iEnd, iHalf=Math.floor(iListLength/2);
						
			if ( oPaging.iTotalPages < iListLength) {
				iStart = 1;
				iEnd = oPaging.iTotalPages;
			}
			else if ( oPaging.iPage <= iHalf ) {
				
				iStart = 1;
				iEnd = iListLength;
			} else if ( oPaging.iPage >= (oPaging.iTotalPages-iHalf) ) {
				iStart = oPaging.iTotalPages - iListLength + 1;
				iEnd = oPaging.iTotalPages;
			} else {
				iStart = oPaging.iPage - iHalf + 1;
				iEnd = iStart + iListLength - 1;
			}

			for ( i=0, ien=an.length ; i<ien ; i++ ) {				
				
				// Remove the middle elements
				$('li:gt(0)', an[i]).filter(':not(:last)').remove();

				// Add the new list items and their event handlers
				for ( j=iStart ; j<=iEnd ; j++ ) {
					sClass = (j==oPaging.iPage+1) ? 'class="active"' : '';
					$('<li '+sClass+'><a href="#">'+j+'</a></li>')
						.insertBefore( $('li:last', an[i])[0] )
						.bind('click', function (e) {
							e.preventDefault();
							oSettings._iDisplayStart = (parseInt($('a', this).text(),10)-1) * oPaging.iLength;
							fnDraw( oSettings );
						} );
				}

				// Add / remove disabled classes from the static elements
				if ( oPaging.iPage === 0 ) {
					$('li:first', an[i]).addClass('disabled');
					
				} else {
					$('li:first', an[i]).removeClass('disabled');
					
				}

				if ( oPaging.iPage === oPaging.iTotalPages-1 || oPaging.iTotalPages === 0 ) {
					$('li:last', an[i]).addClass('disabled');
					
				} else {
					$('li:last', an[i]).removeClass('disabled');
				}
			}
			
			
			if ( !oSettings.aanFeatures.p )
	        {
	            return;
	        }
	        var iPages = Math.ceil((oSettings.fnRecordsDisplay()) / oSettings._iDisplayLength);
	        var iCurrentPage = Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength) + 1;
	          
	        /* Loop over each instance of the pager */
	        var an = oSettings.aanFeatures.p;
	        for ( var i=0, iLen=an.length ; i<iLen ; i++ )
	        {
	            var spans = an[i].getElementsByTagName('span');
	            var inputs = an[i].getElementsByTagName('input');
	            spans[3].innerHTML = " Go";//iPages
	            inputs[0].value = iCurrentPage;
	        }
			
			
		}
	}
} );


/* Bootstrap style pagination control */
$.extend( $.fn.dataTableExt.oPagination, {
	"bootstrap": {
		"fnInit": function( oSettings, nPaging, fnDraw ) {
			var oLang = oSettings.oLanguage.oPaginate;
			var fnClickHandler = function ( e ) {
				e.preventDefault();
				if ( oSettings.oApi._fnPageChange(oSettings, e.data.action) ) {
					fnDraw( oSettings );
				}
			};

			$(nPaging).addClass('pagination').append(
				'<ul>'+
					'<li class="prev disabled"><a href="#"><</a></li>'+
					'<li class="next disabled"><a href="#">></a></li>'+
				'</ul>'
			);
			var els = $('a', nPaging);
			$(els[0]).bind( 'click.DT', { action: "previous" }, fnClickHandler );
			$(els[1]).bind( 'click.DT', { action: "next" }, fnClickHandler );
		},

		"fnUpdate": function ( oSettings, fnDraw ) {
			var iListLength = 5;
			var oPaging = oSettings.oInstance.fnPagingInfo();
			var an = oSettings.aanFeatures.p;
			var i, ien, j, sClass, iStart, iEnd, iHalf=Math.floor(iListLength/2);

			if ( oPaging.iTotalPages < iListLength) {
				iStart = 1;
				iEnd = oPaging.iTotalPages;
			}
			else if ( oPaging.iPage <= iHalf ) {
				iStart = 1;
				iEnd = iListLength;
			} else if ( oPaging.iPage >= (oPaging.iTotalPages-iHalf) ) {
				iStart = oPaging.iTotalPages - iListLength + 1;
				iEnd = oPaging.iTotalPages;
			} else {
				iStart = oPaging.iPage - iHalf + 1;
				iEnd = iStart + iListLength - 1;
			}

			for ( i=0, ien=an.length ; i<ien ; i++ ) {
				// Remove the middle elements
				$('li:gt(0)', an[i]).filter(':not(:last)').remove();

				// Add the new list items and their event handlers
				for ( j=iStart ; j<=iEnd ; j++ ) {
					sClass = (j==oPaging.iPage+1) ? 'class="active"' : '';
					$('<li '+sClass+'><a href="#">'+j+'</a></li>')
						.insertBefore( $('li:last', an[i])[0] )
						.bind('click', function (e) {
							e.preventDefault();
							oSettings._iDisplayStart = (parseInt($('a', this).text(),10)-1) * oPaging.iLength;
							fnDraw( oSettings );
						} );
				}

				// Add / remove disabled classes from the static elements
				if ( oPaging.iPage === 0 ) {
					$('li:first', an[i]).addClass('disabled');
				} else {
					$('li:first', an[i]).removeClass('disabled');
				}

				if ( oPaging.iPage === oPaging.iTotalPages-1 || oPaging.iTotalPages === 0 ) {
					$('li:last', an[i]).addClass('disabled');
				} else {
					$('li:last', an[i]).removeClass('disabled');
				}
			}
		}
	}
} );

/* API method to get paging information */
$.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings) {
    return {
        "iStart": oSettings._iDisplayStart,
        "iEnd": oSettings.fnDisplayEnd(),
        "iLength": oSettings._iDisplayLength,
        "iTotal": oSettings.fnRecordsTotal(),
        "iFilteredTotal": oSettings.fnRecordsDisplay(),
        "iPage": oSettings._iDisplayLength === -1 ?
            0 : Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
        "iTotalPages": oSettings._iDisplayLength === -1 ?
            0 : Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
    };
};

/*
 * TableTools Bootstrap compatibility
 * Required TableTools 2.1+
 */
if ( $.fn.DataTable.TableTools ) {
	// Set the classes that TableTools uses to something suitable for Bootstrap
	$.extend( true, $.fn.DataTable.TableTools.classes, {
		"container": "DTTT btn-group",
		"buttons": {
			"normal": "btn",
			"disabled": "disabled"
		},
		"collection": {
			"container": "DTTT_dropdown dropdown-menu",
			"buttons": {
				"normal": "",
				"disabled": "disabled"
			}
		},
		"print": {
			"info": "DTTT_print_info modal"
		},
		"select": {
			"row": "active"
		}
	} );

	// Have the collection use a bootstrap compatible dropdown
	$.extend( true, $.fn.DataTable.TableTools.DEFAULTS.oTags, {
		"collection": {
			"container": "ul",
			"button": "li",
			"liner": "a"
		}
	} );
}


/* Table initialisation */
$(document).ready(function() {
	$('#example').dataTable( {
		"sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>",
		"sPaginationType": "bootstrap",
		"oLanguage": {
			"sLengthMenu": "_MENU_ records per page"
		},
		
		
		"oTableTools": {
			"aButtons": [
				"copy",
				"print",
				{
					"sExtends":    "collection",
					"sButtonText": 'Save <span class="caret" />',
					"aButtons":    [ "csv", "xls", "pdf" ]
				}
			]
		}
		
	} );
	
	$('#localno').dataTable( {
		"sDom": "<'row-fluid'<'span6'f><'span6'>r>t<'row-fluid'<'span4'i><'span8'p><'span2'>>",
		"sPaginationType": "bootstrap-custom",
		"iDisplayLength" : "5",
		"oLanguage": {
			"sLengthMenu": "_MENU_ records per page",
			"sInfo": "Page _PAGE_ of _PAGES_",
		},
		'fnInfoCallback': function (oSettings) {
    var pagingInfo = $.fn.dataTableExt.oApi.fnPagingInfo(oSettings);
    return 'Page ' + (pagingInfo.iPage + 1) + ' of ' + pagingInfo.iTotalPages;  
	},
	"fnDrawCallback": function(oSettings) {
        if (oSettings.fnRecordsDisplay() == 0) {
            $('.dataTables_paginate').hide();
			$('.dataTables_info').hide();
        }
    },	
		
		
		"oTableTools": {
			"aButtons": [
				"copy",
				"print",
				{
					"sExtends":    "collection",
					"sButtonText": 'Save <span class="caret" />',
					"aButtons":    [ "csv", "xls", "pdf" ]
				}
			]
		}
		
	} );
	
	
	$('#callHistoryTable').dataTable( {
		"sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'f>>",
		"sPaginationType": "bootstrap",
		"oLanguage": {
			"sLengthMenu": "_MENU_ records per page"
		},
		
		
		"oTableTools": {
			"aButtons": [
				"copy",
				"print",
				{
					"sExtends":    "collection",
					"sButtonText": 'Save <span class="caret" />',
					"aButtons":    [ "csv", "xls", "pdf" ]
				}
			]
		}
		
	} );

	$("#callHistoryTable_wrapper .row-fluid").remove();
	$("#callHistoryTable thead tr th:eq(0)").css({"width" : "30px"});
	$("#callHistoryTable thead tr th:eq(1)").css({"width" : "120px"});
	
	$('#chargeHistoryTable').dataTable( {
		"sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>",
		"sPaginationType": "full_numbers",
		"oLanguage": {
			"sLengthMenu": "_MENU_ records per page"
		},
		
		
		"oTableTools": {
			"aButtons": [
				"copy",
				"print",
				{
					"sExtends":    "collection",
					"sButtonText": 'Save <span class="caret" />',
					"aButtons":    [ "csv", "xls", "pdf" ]
				}
			]
		}
		
	} );
	$("#chargeHistoryTable_wrapper .row-fluid").remove();
	
	
	$('#bundles').dataTable({
		
		"sDom": "<'row-fluid'<'span6'><'span6'>r>t<'row-fluid'<'span4'i><'span8'p><'span2'>>",
		"sPaginationType": "bootstrap-custom",
		'iDisplayLength': 5,
		'bLengthChange' : false,
		'fnInfoCallback': function (oSettings) {
			var pagingInfo = $.fn.dataTableExt.oApi.fnPagingInfo(oSettings);
			return 'Page ' + (pagingInfo.iPage + 1) + ' of ' + pagingInfo.iTotalPages;
		},
		"fnDrawCallback": function(oSettings) {
			if (oSettings.fnRecordsDisplay() == 0) {
				$('.dataTables_paginate').hide();
				$('.dataTables_info').hide();
			}
    	},
	});
	
	$('#bundles2').dataTable({
		
		"sDom": "<'row-fluid'<'span6'><'span6'>r>t<'row-fluid'<'span4'i><'span8'p><'span2'>>",
		"sPaginationType": "bootstrap-custom",
		'iDisplayLength': 5,
		'bLengthChange' : false,
		'fnInfoCallback': function (oSettings) {
			var pagingInfo = $.fn.dataTableExt.oApi.fnPagingInfo(oSettings);
			return 'Page ' + (pagingInfo.iPage + 1) + ' of ' + pagingInfo.iTotalPages;
		},
		"fnDrawCallback": function(oSettings) {
			if (oSettings.fnRecordsDisplay() == 0) {
				$('.dataTables_paginate').hide();
				$('.dataTables_info').hide();
			}
    	},
	});
	
 	$('#registered').dataTable({
		
		"sDom": "<'row-fluid'<'span6'><'span6'>r>t<'row-fluid'<'span4'i><'span8'p><'span2'>>",
		"sPaginationType": "bootstrap-custom",
		'iDisplayLength': 5,
		'bLengthChange' : false,
		'fnInfoCallback': function (oSettings) {
			var pagingInfo = $.fn.dataTableExt.oApi.fnPagingInfo(oSettings);
			return 'Page ' + (pagingInfo.iPage + 1) + ' of ' + pagingInfo.iTotalPages;
		},
		"fnDrawCallback": function(oSettings) {
			if (oSettings.fnRecordsDisplay() == 0) {
				$('.dataTables_paginate').hide();
				$('.dataTables_info').hide();
			}
    	}
		
	});
	
	
	


} );
	