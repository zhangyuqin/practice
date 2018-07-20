{x2;include:header}
<body>
{x2;include:nav}
<div class="row-fluid">
	<div class="container-fluid examcontent">
		<div class="exambox" id="datacontent">
			<div class="examform">
				<ul class="breadcrumb">
					<li>
						<span class="icon-home"></span> <a href="index.php?exam">课程选择</a> <span class="divider">/</span>
					</li>
					<li class="active">
						{x2;$data['currentbasic']['basic']}
					</li>
				</ul>
				<ul class="nav nav-tabs">
					<li class="active">
						<a href="#" data-toggle="tab">课程练习</a>
					</li>
				</ul>
				<ul class="thumbnails">
					{x2;if:!$data['currentbasic']['basicexam']['model'] || $data['currentbasic']['basicexam']['model'] == 1}
					<li class="span2">
						<div class="thumbnail">
							<img src="app/core/styles/images/icons/after_class.jpg"/>
							<div class="caption">
								<p class="text-center">
									<a class="btn btn-primary" href="index.php?exam-app-lesson">章节练习</a>
								</p>
							</div>
						</div>
					</li>
					<li class="span2">
						<div class="thumbnail">
							<img src="app/core/styles/images/icons/more_training.jpg"/>
							<div class="caption">
								<p class="text-center">
									<a class="btn btn-primary" href="index.php?exam-app-exercise">强化训练</a>
								</p>
							</div>
						</div>
					</li>
					<li class="span2">
						<div class="thumbnail">
							<img src="app/core/styles/images/icons/simulate_exam.jpg"/>
							<div class="caption">
								<p class="text-center">
									<a class="btn btn-primary" href="index.php?exam-app-exampaper">模拟考试</a>
								</p>
							</div>
						</div>
					</li>
					{x2;endif}
					<li class="span2">
						<div class="thumbnail">
							<img src="app/core/styles/images/icons/apply_certifited.jpg"/>
							<div class="caption">
								<p class="text-center">
									<a class="btn btn-primary" href="index.php?user-center-applycertified">认证申请</a>
								</p>
							</div>
						</div>
					</li>
				</ul>
				{x2;if:!$data['currentbasic']['basicexam']['model'] || $data['currentbasic']['basicexam']['model'] == 1}
				<ul class="nav nav-tabs">
					<li class="active">
						<a href="#" data-toggle="tab">改错复习</a>
					</li>
				</ul>
				<ul class="thumbnails">
					<li class="span2">
						<div class="thumbnail">
							<img src="app/core/styles/images/icons/exam_record.jpg"/>
							<div class="caption">
								<p class="text-center">
									<a class="btn btn-primary" href="index.php?exam-app-history">考试记录</a>
								</p>
							</div>
						</div>
					</li>
					<li class="span2">
						<div class="thumbnail">
							<img src="app/core/styles/images/icons/collection.jpg"/>
							<div class="caption">
								<p class="text-center">
									<a class="btn btn-primary" href="index.php?exam-app-favor">习题收藏</a>
								</p>
							</div>
						</div>
					</li>
				<!-- 	<li class="span2">
					<div class="thumbnail">
						<img src="app/core/styles/images/icons/Retina-Ready.png"/>
						<div class="caption">
							<p class="text-center">
								<a class="btn btn-primary" href="index.php?exam-app-score">成绩单</a>
							</p>
						</div>
					</div>
				</li> -->
				</ul>
				{x2;endif}
			</div>
		</div>
	</div>
</div>
{x2;include:foot}
</body>
</html>