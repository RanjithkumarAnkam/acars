
<?php 
use app\components\EncryptDecryptComponent;
use app\models\TblAcaMedicalData;
?>
<div class="box box-warning container-fluid">
	<div class="box-header with-border">
		<h3 class="box-title col-xs-8">Validate &amp; Create Forms - <?php if(!empty($company_detals['company_name'])){echo htmlentities($company_detals['company_name']); }?> <small><?php if(!empty($company_detals['company_client_number'])){echo '('.htmlentities($company_detals['company_client_number']).')'; }?></small>
		</h3>
		<div class="col-xs-4 pull-right padding-right-0">
			<a class=" btn bg-orange btn-social pull-right " data-toggle="tooltip" data-placement="bottom" title="Click to view help video" 
				onclick="playVideo(7);"> <i class="fa fa-youtube-play"></i>View Help
				Video
			</a>
		</div>
	</div>
	<div class="col-md-12">
		<div class="col-xs-12 header-new-main">
			<span class="header-icon-band"><i
				class="fa fa-file-text-o icon-band lighter"></i></span>
			<p class="sub-header-new">You can update with the correct information
				from this screen</p>
		</div>
	</div>

	<!-- /.box-header -->
	

	<div class="col-md-12 " style="padding-top:0;">		
		<div class="row">
			<div class="">
				<div class="box box-solid" style="padding-top:0;">
					<!-- /.box-header -->
					<div class="box-body" style="padding-top:0;">
						<div class="box-group" id="accordion">
							<div class="" id="meccoverage">
								<div class="box-body" style="padding-top:0;">
								
									<div class="col-md-12" style="padding-top:0;">
									<h4 style="font-weight:bold;float:left;width:80%;">Validate Report ( Medical Data )</h4>
									<a data-toggle="tooltip" data-placement="bottom" title="Click to go to validate and create forms" class="btn btn-default btn-default-cancel pull-right" style="color:red;"
									href="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/client/validateforms?c_id=<?php echo $encoded_company_id;?>">
									Back</a>								
									<div class="col-xs-8" style="line-height: 35px;border:1px solid #ccc;padding:0px;">
									<?php if(!empty($arr_medical_individual_issues)){
											$count=0;
											foreach($arr_medical_individual_issues as $medical_individual_issues){?>
										<div class="col-xs-6" style="<?php if($count%2 == 0){?> background:#eee; <?php }?>"><?php echo $medical_individual_issues['medical_firstname'].' '.$medical_individual_issues['medical_middlename'].' '.$medical_individual_issues['medical_lastname'];?> ( SSN: <b><?php echo $medical_individual_issues['medical_ssn'];?></b> )</div>
										<div class="col-xs-6" style="<?php if($count%2 == 0){?> background:#eee; <?php }?>"><a  data-toggle="tooltip" data-placement="right" title="Click to view <?php echo $medical_individual_issues['medical_firstname'].' '.$medical_individual_issues['medical_middlename'].' '.$medical_individual_issues['medical_lastname'];?> issue(s)" href="<?php echo Yii::$app->getUrlManager()->getBaseUrl(); ?>/client/validateforms/medicalindividualvalidation?c_id=<?php echo $encoded_company_id; ?>&medical_id=<?php echo $medical_individual_issues['medical_id']; ?>"><b style="color:red;"><?php echo $medical_individual_issues['issue_count'];?> Issue(s)</b></a></div>										
										<?php $count++; }?>
									<?php }?>
									</div>								
								</div>
							</div>
							<!-- /.box-body -->
						</div>
						<!-- /.box -->
						<div class="col-md-12" style="padding-left:25px;<?php if($total_issue_count>10){?>display:block;<?php }else{?>display:none; <?php }?>">
						<?php 

							$num_rec_per_page=10;
							

							$total_records = $error_medical_classes_count;  //count number of records
							$total_pages = ceil($total_records / $num_rec_per_page);
							if($total_records>10){


							$get_company_id = \Yii::$app->request->get ();
							if (isset($get_company_id['page_id'])) {
								$page  = $get_company_id['page_id'];
							} else {
								$page=1;
							}
							$url =Yii::$app->getUrlManager()->getBaseUrl();

							echo "<a style='padding: 0px 3px 0px 3px; border: 1px solid #ccc; ' href='$url/client/validateforms/medicalvalidation?c_id=".$encoded_company_id."&page_id=1'>".'<<'."</a> "; // Goto 1st page  

							for($i = $page + 1; $i <= min($page + 11, $total_pages); $i++){

							echo "<a style='padding: 0px 3px 0px 3px; border: 1px solid #ccc; margin-left: 3px;' href='$url/client/validateforms/medicalvalidation?c_id=".$encoded_company_id."&page_id=".$i."'>".$i."</a> ";

							};
								

							echo "<a style='padding: 0px 3px 0px 3px; border: 1px solid #ccc; margin-left: 3px;' href='$url/client/validateforms/medicalvalidation?c_id=".$encoded_company_id."&page_id=$total_pages'>".'>>'."</a> "; // Goto last page
							}
							?>
						
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
						

