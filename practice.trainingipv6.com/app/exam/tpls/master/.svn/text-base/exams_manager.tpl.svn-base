{x2;if:!$userhash}
{x2;include:header}
<body>
{x2;include:nav}
<div class="container-fluid">
	<div class="row-fluid">
		<div class="span2">
			{x2;include:menu}
		</div>
		<div class="span10" id="datacontent">
{x2;endif}
			<ul class="breadcrumb">
				<li class="active">考场选择</li>
			</ul>
			<ul class="nav nav-tabs">
				<li class="active">
					<a href="#">考场选择</a>
				</li>
			</ul>
	        <form action="index.php?exam-teach-users-basics" method="post" class="form-inline">
				<table class="table">
					<thead>
						<tr>
							<th colspan="6">搜索</th>
						</tr>
					</thead>
					<tr>
						<td>
							考场ID：
						</td>
						<td>
							<input name="search[basicid]" class="inline" type="text" class="number" value="{x2;$search['basicid']}"/>
						</td>
						<td>
							关键字：
						</td>
						<td>
							<input name="search[keyword]" type="text" value="{x2;$search['keyword']}"/>
						</td>
			        </tr>
			        <tr>
						<td>
							科目：
						</td>
						<td>
			        		<select name="search[basicsubjectid]">
			        		<option value="0">选择科目</option>
					  		{x2;tree:$subjects,subject,sid}
					  		<option value="{x2;v:subject['subjectid']}"{x2;if:v:subject['subjectid'] == $search['basicsubjectid']} selected{x2;endif}>{x2;v:subject['subject']}</option>
					  		{x2;endtree}
					  		</select>
			        	</td>
						<td>
							<button class="btn btn-primary" type="submit">搜索</button>
							<input type="hidden" value="1" name="search[argsmodel]" />
							<input type="hidden" value="{x2;$userid}" name="userid" />
						</td>
						<td></td>
					</tr>
				</table>
			</form>
	        <table class="table table-hover">
	            <thead>
	                <tr>
	                    <th>考场ID</th>
				        <th>考场名称</th>
				       <!--  <th>考场地区</th> -->
				        <th>考试科目</th>
				        <th>状态</th>
				        <th>操作</th>
	                </tr>
	            </thead>
	            <tbody>
                    {x2;tree:$basics['data'],basic,bid}
			        <tr>
						<td>
							{x2;v:basic['basicid']}
						</td>
						<td>
							{x2;v:basic['basic']}
						</td>
					<!-- 	<td>
							{x2;$areas[v:basic['basicareaid']]['area']}
						</td> -->
						<td>
							{x2;$subjects[v:basic['basicsubjectid']]['subject']}
						</td>
						<td>
							{x2;if:v:basic['basicopen']}已开启{x2;else}未开启{x2;endif}
						</td>
						<td>
							{x2;if:v:basic['basicopen']}<a class="ajax btn" title="关闭考场" href="index.php?exam-master-exammanager-closebasics&basicid={x2;v:basic['basicid']}"><em class="icon-minus-sign"></em></a>{x2;else}<a class="ajax btn" href="index.php?exam-master-exammanager-openbasics&basicid={x2;v:basic['basicid']}" title="开启考场"><em class="icon-plus-sign"></em></a>{x2;endif}
						</td>
			        </tr>
			        {x2;endtree}
	        	</tbody>
	        </table>
	        <div class="pagination pagination-right">
	            <ul>{x2;$basics['pages']}</ul>
	        </div>
{x2;if:!$userhash}
		</div>
	</div>
</div>
</body>
</html>
{x2;endif}