<?php $this->view('partials/head'); ?>

<?php //Initialize models needed for the table
new Machine_model;
new Reportdata_model;
new Directory_service_model;
?>

<div class="container">

  <div class="row">

  	<div class="col-lg-12">
		<script type="text/javascript">

		$(document).on('appReady', function(e, lang) {

				// Get modifiers from data attribute
				var myCols = [], // Colnames
					mySort = [], // Initial sort
					hideThese = [], // Hidden columns
					col = 0; // Column counter

				$('.table th').map(function(){

					  myCols.push({'mData' : $(this).data('colname')});

					  if($(this).data('sort'))
					  {
					  	mySort.push([col, $(this).data('sort')])
					  }

					  if($(this).data('hide'))
					  {
					  	hideThese.push(col);
					  }

					  col++
				});

			    oTable = $('.table').dataTable( {
			        "sAjaxSource": "<?php echo url('datatables/data'); ?>",
			        "aaSorting": mySort,
			        "aoColumns": myCols,
			        "aoColumnDefs": [
			        	{ 'bVisible': false, "aTargets": hideThese }
					],
			        "fnCreatedRow": function( nRow, aData, iDataIndex ) {
			        	// Update name in first column to link
			        	var name=$('td:eq(0)', nRow).html();
			        	if(name == ''){name = "No Name"};
			        	var sn=$('td:eq(1)', nRow).html();
			        	var link = get_client_detail_link(name, sn, '<?php echo url(); ?>/', '#tab_directory-tab');
			        	$('td:eq(0)', nRow).html(link);
			        	
			        	// Translate bool. todo function for any bool we find
                        var status=$('td:eq(7)', nRow).html();
                        status = status == 1 ? 'Yes' : 
                        (status === '0' ? 'No' : '')
                        $('td:eq(7)', nRow).html(status)

				    }
			    } );
			} );
		</script>

		  <h3>Directory Services report <span id="total-count" class='label label-primary'>…</span></h3>

		  <table class="table table-striped table-condensed table-bordered">
		    <thead>
		      <tr>
		      	<th data-i18n="listing.computername" data-colname='machine#computer_name'>Name</th>
		        <th data-i18n="serial" data-colname='machine#serial_number'>Serial</th>
		        <th data-i18n="listing.username" data-colname='reportdata#long_username'>Username</th>
		        <th data-colname='directoryservice#which_directory_service'>Bound Status</th> 
		        <th data-colname='directoryservice#addomain'>AD Domain</th>
		        <th data-colname='directoryservice#computeraccount'>Computer Account</th>
		        <th data-colname='directoryservice#directory_service_comments'>AD Comments</th>
				<th data-colname='directoryservice#createmobileaccount'>Mobile account</th>
				<th data-colname='directoryservice#networkprotocoltobeused'>Network protocol</th>
				<th data-colname='directoryservice#allowedadmingroups'>Allowed admin groups</th>
		      </tr>
		    </thead>
		    <tbody>
		    	<tr>
					<td colspan="5" class="dataTables_empty">Loading data from server</td>
				</tr>
		    </tbody>
		  </table>
    </div> <!-- /span 12 -->
  </div> <!-- /row -->
</div>  <!-- /container -->

<?php $this->view('partials/foot'); ?>