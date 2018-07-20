{x2;include:header}
<body>
{x2;include:nav}
<div class="row-fluid">
	<div class="container-fluid examcontent">
		<div class="span2 exambox">
			<div class="examform">
				<div>
					{x2;include:menu}
				</div>
			</div>
		</div>
		<div class="span10 exambox" id="datacontent">
			<div class="examform">
				<div>
					<ul class="breadcrumb">
						<li><a href="index.php?{x2;$_app}-app">用户中心</a> <span class="divider">/</span></li>
						<li class="active">申请认证</li>
					</ul>
					<div class="row-fluid" id="applycertified">
						<form action="index.php?user-center-applycertified-apply" method="post" name="form3" class="form-horizontal">
						<legend>Personal Details</legend>
						<div class="control-group">
							<label for="" class="control-label">Want to apply for:</label>
							<div class="controls">
								<select name="applyType">
									{x2;tree:$applyType,apply,aid}
									<option value="{x2;v:apply['id']}">{x2;v:apply['certifiedName']}</option>
									{x2;endtree}
								</select>
								
							</div>
						</div>
						<legend>Application Details</legend>
						<div class="control-group">
							<label for="" class="control-label">* Salutation:</label>
							<div class="controls">
								<label class="radio inline">
									<input type="radio" value="Mr." name="salutation" checked="checked"/>Mr.
								</label>
								<label class="radio inline">
									<input type="radio" value="Ms." name="salutation"/>Ms.
								</label>
							</div>
						</div>
						<div class="control-group">
							<label for="" class="control-label">* Name:</label>
							<div class="controls">
								<input type="text" id="username" name="name" needle="needle" datatype="username" msg="请输入正确的姓名"/>
								<img width="20" height="15" align="absbottom" src="app/core/styles/images/info.jpg" style="vertical-align:middle; ">
								请填写真实姓名
							</div>
						</div>
						<div class="control-group">
							<label for="" class="control-label">* Email:</label>
							<div class="controls">
								<input type="text" name="email" needle="needle" datatype="email" msg="请输入正确格式的电子邮箱"/>
								<img width="20" height="15" align="absbottom" src="app/core/styles/images/info.jpg" style="vertical-align:middle; ">
									www@example.com
							</div>
						</div>
						<div class="control-group">
							<label for="" class="control-label">* Passport / IC no.:</label>
							<div class="controls">
								<input type="text" name="passport" needle="needle" msg="请输入正确格式的护照或身份证"/>
								<img width="20" height="15" align="absbottom" src="app/core/styles/images/info.jpg" style="vertical-align:middle; ">
									请填写正确护照或身份证
							</div>
						</div>
						<div class="control-group">
							<label for="" class="control-label">* Mobile phone:</label>
							<div class="controls">
								<input type="text" name="phone" needle="needle" datatype="cellphone" msg="请输入正确的电话号码"/>
								<img width="20" height="15" align="absbottom" src="app/core/styles/images/info.jpg" style="vertical-align:middle; ">
							</div>
						</div>
						<legend>Company Details</legend>
						<div class="control-group">
							<label for="" class="control-label">* Company:</label>
							<div class="controls">
								<input type="text" name="company" needle="needle" msg="请填写正确的公司信息">
								<img width="20" height="15" align="absbottom" src="app/core/styles/images/info.jpg" style="vertical-align:middle; ">
									请填写正确公司信息
							</div>
						</div>
						<div class="control-group">
							<label for="" class="control-label">* Country:</label>
							<div class="controls">
								<select id="country"  name="country">
									<option value="Afghanistan">Afghanistan</option>
									<option value="Albania">Albania</option>
									<option value="Algeria">Algeria</option>
									<option value="American Samoa">American Samoa</option>
									<option value="Andorra">Andorra</option>
									<option value="Angola">Angola</option>
									<option value="Anguilla">Anguilla</option>
									<option value="Antarctica">Antarctica</option>
									<option value="Antigua and Barbuda">Antigua and Barbuda</option>
									<option value="Argentina">Argentina</option>
									<option value="Armenia">Armenia</option>
									<option value="Aruba">Aruba</option>
									<option value="Australia">Australia</option>
									<option value="Austria">Austria</option>
									<option value="Azerbaijan">Azerbaijan</option>
									<option value="Bahamas">Bahamas</option>
									<option value="Bahrain">Bahrain</option>
									<option value="Bangladesh">Bangladesh</option>
									<option value="Barbados">Barbados</option>
									<option value="Belarus">Belarus</option>
									<option value="Belgium">Belgium</option>
									<option value="Belize">Belize</option>
									<option value="Benin">Benin</option>
									<option value="Bermuda">Bermuda</option>
									<option value="Bhutan">Bhutan</option>
									<option value="Bolivia">Bolivia</option>
									<option value="Bosnia and Herzegowina">Bosnia and Herzegowina</option>
									<option value="Botswana">Botswana</option>
									<option value="Bouvet Island">Bouvet Island</option>
									<option value="Brazil">Brazil</option>
									<option value="British Indian OceanTerritory">British Indian OceanTerritory</option>
									<option value="Brunei Darussalam">Brunei Darussalam</option>
									<option value="Bulgaria">Bulgaria</option>
									<option value="Burkina Faso">Burkina Faso</option>
									<option value="Burundi">Burundi</option>
									<option value="Cambodia">Cambodia</option>
									<option value="Cameroon">Cameroon</option>
									<option value="Canada">Canada</option>
									<option value="Cape Verde">Cape Verde</option>
									<option value="Cayman Islands">Cayman Islands</option>
									<option value="Central African Republic">Central African Republic</option>
									<option value="Chad">Chad</option>
									<option value="Chile">Chile</option>
									<option value="China" selected="selected">China</option>
									<option value="Christmas Island">Christmas Island</option>
									<option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
									<option value="Colombia">Colombia</option>
									<option value="Comoros">Comoros</option>
									<option value="Congo">Congo</option>
									<option value="Cook Islands">Cook Islands</option>
									<option value="Costa Rica">Costa Rica</option>
									<option value="Cote D Ivoire">Cote D Ivoire</option>
									<option value="Croatia">Croatia</option>
									<option value="Cuba">Cuba</option>
									<option value="Cyprus">Cyprus</option>
									<option value="Czech Republic">Czech Republic</option>
									<option value="Denmark">Denmark</option>
									<option value="Djibouti">Djibouti</option>
									<option value="Dominica">Dominica</option>
									<option value="Dominican Republic">Dominican Republic</option>
									<option value="East Timor">East Timor</option>
									<option value="Ecuador">Ecuador</option>
									<option value="Egypt">Egypt</option>
									<option value="El Salvador">El Salvador</option>
									<option value="Equatorial Guinea">Equatorial Guinea</option>
									<option value="Eritrea">Eritrea</option>
									<option value="Estonia">Estonia</option>
									<option value="Ethiopia">Ethiopia</option>
									<option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
									<option value="Faroe Islands">Faroe Islands</option>
									<option value="Fiji">Fiji</option>
									<option value="Finland">Finland</option>
									<option value="France">France</option>
									<option value="France Metropolitan">France Metropolitan</option>
									<option value="French Guiana">French Guiana</option>
									<option value="French Polynesia">French Polynesia</option>
									<option value="French Southern Territories">French Southern Territories</option>
									<option value="Gabon">Gabon</option>
									<option value="Gambia">Gambia</option>
									<option value="Georgia">Georgia</option>
									<option value="Germany">Germany</option>
									<option value="Ghana">Ghana</option>
									<option value="Gibraltar">Gibraltar</option>
									<option value="Greece">Greece</option>
									<option value="Greenland">Greenland</option>
									<option value="Grenada">Grenada</option>
									<option value="Guadeloupe">Guadeloupe</option>
									<option value="Guam">Guam</option>
									<option value="Guatemala">Guatemala</option>
									<option value="Guinea">Guinea</option>
									<option value="Guinea-bissau">Guinea-bissau</option>
									<option value="Guyana">Guyana</option>
									<option value="Haiti">Haiti</option>
									<option value="Heard and Mc Donald Islands">Heard and Mc Donald Islands</option>
									<option value="Honduras">Honduras</option>
									<option value="Hungary">Hungary</option>
									<option value="Iceland">Iceland</option>
									<option value="India">India</option>
									<option value="Indonesia">Indonesia</option>
									<option value="Iran (Islamic Republic of)">Iran (Islamic Republic of)</option>
									<option value="Iraq">Iraq</option>
									<option value="Ireland">Ireland</option>
									<option value="Israel">Israel</option>
									<option value="Italy">Italy</option>
									<option value="Jamaica">Jamaica</option>
									<option value="Japan">Japan</option>
									<option value="Jordan">Jordan</option>
									<option value="Kazakhstan">Kazakhstan</option>
									<option value="Kenya">Kenya</option>
									<option value="Kiribati">Kiribati</option>
									<option value="Korea Democratic People">Korea Democratic People's Republic of</option>
									<option value="Kuwait">Kuwait</option>
									<option value="Kyrgyzstan">Kyrgyzstan</option>
									<option value="Lao People">Lao People's Democratic Republic</option>
									<option value="Latvia">Latvia</option>
									<option value="Lebanon">Lebanon</option>
									<option value="Lesotho">Lesotho</option>
									<option value="Liberia">Liberia</option>
									<option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
									<option value="Liechtenstein">Liechtenstein</option>
									<option value="Lithuania">Lithuania</option>
									<option value="Luxembourg">Luxembourg</option>
									<option value="Macau">Macau</option>
									<option value="Macedonia The Former Yugoslav Republic of">Macedonia The Former Yugoslav Republic of</option>
									<option value="Madagascar">Madagascar</option>
									<option value="Malawi">Malawi</option>
									<option value="Malaysia">Malaysia</option>
									<option value="Maldives">Maldives</option>
									<option value="Mali">Mali</option>
									<option value="Malta">Malta</option>
									<option value="Marshall Islands">Marshall Islands</option>
									<option value="Martinique">Martinique</option>
									<option value="Mauritania">Mauritania</option>
									<option value="Mauritius">Mauritius</option>
									<option value="Mayotte">Mayotte</option>
									<option value="Mexico">Mexico</option>
									<option value="Micronesia Federated States of ">Micronesia Federated States of </option>
									<option value="Moldova, Republic of">Moldova, Republic of</option>
									<option value="Monaco">Monaco</option>
									<option value="Mongolia">Mongolia</option>
									<option value="Montserrat">Montserrat</option>
									<option value="Morocco">Morocco</option>
									<option value="Mozambique">Mozambique</option>
									<option value="Myanmar">Myanmar</option>
									<option value="Namibia">Namibia</option>
									<option value="Nauru">Nauru</option>
									<option value="Nepal">Nepal</option>
									<option value="Netherlands">Netherlands</option>
									<option value="Netherlands Antilles">Netherlands Antilles</option>
									<option value="New Caledonia">New Caledonia</option>
									<option value="New Zealand">New Zealand</option>
									<option value="Nicaragua">Nicaragua</option>
									<option value="Niger">Niger</option>
									<option value="Nigeria">Nigeria</option>
									<option value="Niue">Niue</option>
									<option value="Norfolk Island">Norfolk Island</option>
									<option value="Northern Mariana Islands">Northern Mariana Islands</option>
									<option value="Norway">Norway</option>
									<option value="Oman">Oman</option>
									<option value="Pakistan">Pakistan</option>
									<option value="Palau">Palau</option>
									<option value="Panama">Panama</option>
									<option value="Papua New Guinea">Papua New Guinea</option>
									<option value="Paraguay">Paraguay</option>
									<option value="Peru">Peru</option>
									<option value="Philippines">Philippines</option>
									<option value="Pitcairn">Pitcairn</option>
									<option value="Poland">Poland</option>
									<option value="Portugal">Portugal</option>
									<option value="Puerto Rico">Puerto Rico</option>
									<option value="Qatar">Qatar</option>
									<option value="Republic Korea, South Korea">Republic Korea, South Korea</option>
									<option value="Reunion">Reunion</option>
									<option value="Romania">Romania</option>
									<option value="Russian Federation">Russian Federation</option>
									<option value="Rwanda">Rwanda</option>
									<option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
									<option value="Saint Lucia">Saint Lucia</option>
									<option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
									<option value="Samoa">Samoa</option>
									<option value="San Marino">San Marino</option>
									<option value="Sao Tome and Principe">Sao Tome and Principe</option>
									<option value="Saudi Arabia">Saudi Arabia</option>
									<option value="Senegal">Senegal</option>
									<option value="Seychelles">Seychelles</option>
									<option value="Sierra Leone">Sierra Leone</option>
									<option value="Singapore">Singapore</option>
									<option value="Slovakia (Slovak Republic)">Slovakia (Slovak Republic)</option>
									<option value="Slovenia">Slovenia</option>
									<option value="Solomon Islands">Solomon Islands</option>
									<option value="Somalia">Somalia</option>
									<option value="South Africa">South Africa</option>
									<option value="South Georgia and the South Sandwich Islands">South Georgia and the South Sandwich Islands</option>
									<option value="Spain">Spain</option>
									<option value="Sri Lanka">Sri Lanka</option>
									<option value="St. Helena">St. Helena</option>
									<option value="St. Pierre and Miquelon">St. Pierre and Miquelon</option>
									<option value="Sudan">Sudan</option>
									<option value="Suriname">Suriname</option>
									<option value="Svalbard and Jan Mayen Islands">Svalbard and Jan Mayen Islands</option>
									<option value="Swaziland">Swaziland</option>
									<option value="Sweden">Sweden</option>
									<option value="Switzerland">Switzerland</option>
									<option value="Syrian Arab Republic">Syrian Arab Republic</option>
									<option value="Tajikistan">Tajikistan</option>
									<option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
									<option value="Thailand">Thailand</option>
									<option value="Togo">Togo</option>
									<option value="Tokelau">Tokelau</option>
									<option value="Tonga">Tonga</option>
									<option value="Trinidad and Tobago">Trinidad and Tobago</option>
									<option value="Tunisia">Tunisia</option>
									<option value="Turkey">Turkey</option>
									<option value="Turkmenistan">Turkmenistan</option>
									<option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
									<option value="Tuvalu">Tuvalu</option>
									<option value="Uganda">Uganda</option>
									<option value="Ukraine">Ukraine</option>
									<option value="United Arab Emirates">United Arab Emirates</option>
									<option value="United Kingdom">United Kingdom</option>
									<option value="United States">United States</option>
									<option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
									<option value="Uruguay">Uruguay</option>
									<option value="Uzbekistan">Uzbekistan</option>
									<option value="Vanuatu">Vanuatu</option>
									<option value="Vatican City State (Holy See)">Vatican City State (Holy See)</option>
									<option value="Venezuela">Venezuela</option>
									<option value="Vietnam">Vietnam</option>
									<option value="Virgin Islands (British)">Virgin Islands (British)</option>
									<option value="Virgin Islands (U.S.)">Virgin Islands (U.S.)</option>
									<option value="Wallis and Futuna Islands">Wallis and Futuna Islands</option>
									<option value="Western Sahara">Western Sahara</option>
									<option value="Yemen">Yemen</option>
									<option value="Yugoslavia">Yugoslavia</option>
									<option value="Zaire">Zaire</option>
									<option value="Zambia">Zambia</option>
									<option value="Zimbabwe">Zimbabwe</option>
								</select>
							</div>
						</div>
						<div class="control-group">
							<label for="" class="control-label">* Department:</label>
							<div class="controls">
								<input type="text" name="department" needle="needle" msg="请填写所在部门信息">
								<img width="20" height="15" align="absbottom" src="app/core/styles/images/info.jpg" style="vertical-align:middle; ">
									请填写所在部门信息
							</div>
						</div>
						<div class="control-group">
							<label for="" class="control-label">* Designation:</label>
							<div class="controls">
								<input type="text" name="designation" needle="needle" msg="请填写担任职位">
								<img width="20" height="15" align="absbottom" src="app/core/styles/images/info.jpg" style="vertical-align:middle; ">
									请填写担任职位
							</div>
						</div>
						<div class="control-group">
							<label for="" class="control-label">* Tel:</label>
							<div class="controls">
								<input type="text" name="tel" needle="needle" datatype="landline" msg="填写正确的座机">
								<img width="20" height="15" align="absbottom" src="app/core/styles/images/info.jpg" style="vertical-align:middle; ">
									(8610)-58677002-5867
							</div>
						</div>
						<div class="control-group">
							<label for="" class="control-label">* Fax:</label>
							<div class="controls">
								<input type="text" name="fax" needle="needle" datatype="fax" msg="填写正确的传真号码">
								<img width="20" height="15" align="absbottom" src="app/core/styles/images/info.jpg" style="vertical-align:middle; ">
									(8610)-58677002
							</div>
						</div>
						<div class="control-group">
							<label for="" class="control-label">* Adress:</label>
							<div class="controls">
								<input type="text" name="address" needle="needle" msg="请填写正确的地址">
								<img width="20" height="15" align="absbottom" src="app/core/styles/images/info.jpg" style="vertical-align:middle; ">
									请填写正确的地址
							</div>
						</div>
						<div class="control-group">
							<label for="" class="control-label">* Postcode/Zip:</label>
							<div class="controls">
								<input type="text" name="postcode" needle="needle" datatype="code" msg="填写正确的邮编">
								<img width="20" height="15" align="absbottom" src="app/core/styles/images/info.jpg" style="vertical-align:middle; ">
									100000
							</div>
						</div>
						<div class="control-group">
							<label for="" class="control-label">* Industrial Role:</label>
							<div class="controls">
								<select  name="industrialRole">
									<option value="Carrier">Carrier</option>
									<option value="Gov.">Gov.</option>
									<option value="Media">Media</option>
									<option value="Vendor">Vendor</option>
									<option value="Institute">Institute</option>
									<option value="Industrial User">Industrial User</option>
									<option value="Others">Others</option>
								</select>
							</div>
						</div>
						<div class="control-group">
							<label for="" class="control-label">Organization Type::</label>
							<div class="controls">
								<select name="organizationType">
									<option value="State-own">State-own</option>
									<option value="Foreign or Joint">Foreign or Joint</option>
									<option value="Private">Private</option>
									<option value="Joint Stock">Joint Stock</option>
									<option value="Gov.">Gov.</option>
									<option value="University">University</option>
									<option value="International Org.">International Org.</option>
									<option value="Others">Others</option>
								</select>
							</div>
						</div>
						<div class="control-group">
							<label for="" class="control-label">Company Type:</label>
							<div class="controls">
								<select  name="companyType">
									<option value="SP">SP</option>
									<option value="Vendor">Vendor</option>
									<option value="Integration">Integration</option>
									<option value="Internet">Internet</option>
									<option value="Gov.">Gov.</option>
									<option value="Research">Research</option>
									<option value="VC">VC</option>
									<option value="Public Entity">Public Entity</option>
									<option value="Consulting">Consulting</option>
									<option value="Others">Others</option>
								</select>
							</div>
						</div>
						<div class="control-group">
							<label for="" class="control-label">Company Scale:</label>
							<div class="controls">
								<select  name="companyScale">
									<option value="Less than 10">Less than 10</option>
									<option value="10-100">10-100</option>
									<option value="100-500">100-500</option>
									<option value="500-1000">500-1000</option>
									<option value="1000-5000">1000-5000</option>
									<option value="5000-10000">5000-10000</option>
									<option value="over 10000">over 10000</option>
								</select>
							</div>
						</div>
						<div class="control-group">
							<label for="" class="control-label">Other Details:</label>
							<div class="controls">
								<textarea name="companyOtherDetails" rows="3"></textarea>
							</div>
						</div>
						<legend>Certification Details</legend>
						<div class="control-group">
							<label for="" class="control-label">Production IPv6 Experience:</label>
							<div class="controls">
								<select id="prodexp"  name="experience">
									<option value="0 year">0 year</option>
									<option value="1 year">1 year</option>
									<option value="2 years">2 years</option>
									<option value="3 years">3 years</option>
									<option value="4 years">4 years</option>
									<option value="5 years">5 years</option>
									<option value="6 years">6 years</option>
									<option value="7 years">7 years</option>
									<option value="8 years">8 years</option>
									<option value="9 years">9 years</option>
									<option value="10 years">10 years</option>
									<option value="More than 10 years">More than 10 years</option>
								</select>
							</div>
						</div>
						<div class="control-group">
							<label for="" class="control-label">Other Details:</label>
							<div class="controls">
								<textarea id="otherdetails" name="certificationOtherDetails" rows="3"></textarea>
							</div>
						</div>
						<div class="control-group">
							<label for="" class="control-label"></label>
							<div class="controls">
								<input type="hidden" name="form" value="1">
								<input type="submit" class="submit btn btn-primary" value="提交" />
							</div>
						</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>