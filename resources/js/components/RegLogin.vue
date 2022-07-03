<template>
    <div>
		<div class="login-container">

			<div class="middle-login" id="log_in">
				<div class="block-flat">


					<form action="#login" method="post">

						<div class="logo_txt" align="center" colspan="3">
							<table>
								<tbody>
									<tr>
										<td style="padding-left:0px;border: 0px; width:28%;">
											<img src="assetsReg/images/costpslogo.png" width="38" height="51" alt="cost.ps"
												style="float:left; padding-top:-15px" />
										</td>
										<td style="padding-right:5px;border:0px;">
											<span class="slash" style="margin-top:10px">|</span>
											<span class="nafza">نافذة تسجيل الدخول</span>
										</td>
									</tr>
								</tbody>
							</table>
						</div>


						<div class="login_inputs" align="center">
							
							<div class="crids" dir="rtl">
						
								<div>
									
									<input type="email" name="username" v-model="user.email" class="ema" required="required"
										placeholder="البريد الإلكتروني الخاص بك" /> <br>
										<samp v-if="errors.email" style="margin-left: 62px;" class="error_res" >{{ errors.email[0] }}</samp>
										<br>
								    


								</div>
									 
                                
								<div class="password">
									
									
									<input type="password" name="password" class="pass" v-model="user.password" required="required"
										placeholder="كلمة المرور"  /><br>
										<samp v-if="errors.email" style="margin-left: 83px;" class="error_res" >{{ errors.password[0] }}</samp>
					                 


								</div>
								
							</div>
							<div class="login_button">

								<input type="submit" style="height: 101px;" class="button" name="login" value="" @click.prevent="Login()">

							</div>

						</div>

					</form>




				</div>
					<div class="lost_new" style="margin-top: -24%;">
						<button class="forget_pass" style="margin-top: 10.8%;border-radius: 0px 0px 14px 0px;" name="forget_pass" onClick="forget();">إسترجاع كلمة المرور</button>
						<button class="new_user" style="margin-top: 10.8%;border-radius: 0px 0px 0px 13px;" name="new_user" onClick="signUp();">مشترك جديد</button>
					</div>
			</div>


			<div class="middle-signup" id="sign_up" style="visibility:hidden">
				<div class="block-flat1">

					<form action="#register" method="post">


						<div class="logo_txt2" align="center" colspan="3">
							<table>
								<tbody>
									<tr>
										<td style="padding-left:0px;border: 0px; width:28%;">

											<img src="assetsReg/images/costpslogo.png" width="38" height="51" alt="cost.ps"
												style="float:left; padding-top:-15px" />

										</td>

										<td style="padding-right:5px;border: 0px;">
											<span class="slash" style="margin-top:10px">|</span>
											<span class="nafza">تسجيل إشتراك في نظام</span>
										</td>
									</tr>
								</tbody>
							</table>

						</div>

						<div class="login_inputs" align="center">
							<div class="field-set">
								<br>
								<div>
								<span class="input-item1">
									<i class="fa fa-user"></i>
								</span>
								<!--   user name Input-->
								<input class="form-input1" id="txt-input" type="text" v-model="user.name" placeholder="الإسـم" required>
								<br>
								<samp v-if="errors.name" style="margin-left: 242px;font-size: 12px;" class="error_res" >{{ errors.name[0] }}</samp>
								<br>
								</div>

								<div>
								<span class="input-item2">
									<i class="fa fa-envelope"></i>
								</span>
								<!--   user name Input-->
								<input class="form-input2" id="txt-input" type="email" v-model="user.email" placeholder="البريد الالكتروني"
									required>
									
									
									<span class="input-item3">
									<i class="fa fa-phone"></i>
								</span>
								<!--   user name Input-->
								
								<input class="form-input3" id="txt-input" type="text" v-model="user.phone" placeholder="الهاتف" required>
								<br>
								<samp v-if="errors.phone" style="margin-left: 71px;font-size: 12px;" class="error_res" >{{ errors.phone[0] }}</samp>
								<samp v-if="errors.email" style="margin-left: 25px;font-size: 12px;" class="error_res" >{{ errors.email[0] }}</samp>
								<br>
                              </div>

								<div>
								
								
								<span class="input-item4">
									<i class="fa fa-lock"></i>
 								</span>
                               
								<!--   user name Input-->
								<input class="form-input4" id="txt-input" type="text" v-model="user.password_confirmation" placeholder="اعد كلمة المرور"
									required>

								<span class="input-item5">
									<i class="fa fa-lock"></i>
								</span>
								<!--   user name Input-->
								<input class="form-input5" id="txt-input" type="text" v-model="user.password" placeholder=" كلمة المرور" required>
                                    <br>
									<samp v-if="errors.password" style="margin-left: 40px;font-size: 12px;" class="error_res" >{{ errors.password[0] }}</samp>
									<samp v-if="errors.password_confirmation" style="margin-left: 30px;font-size: 12px;" class="error_res" >{{ errors.password_confirmation[0] }}</samp>
									<br>
									</div>
								<div class="login_button">
									<input type="submit" @click.prevent="Register()" style="margin-top:-167px;" class="button2" name="register" value="" />
								</div>
							</div>
						</div>
					</form>


				</div>
					<div class="lost_new" style="margin-top: -103px;">
						<button class="forget_pass1" name="forget_pass" style="margin-top: 10.8%;border-radius: 0px 0px 14px;" onClick="forget();">إسترجاع كلمة المرور</button>
						<button class="log_in1" style="margin-top: 10.8%;border-radius: 0px 0px 0px 13px;" name="log_in" id="log" onClick="logIn();">تسجيل الدخول</button>
					</div>
			</div>


			<div class="middle-login" id="forget_pass" style="visibility:hidden">
        <div class="block-flat">
			<form action="forgot_password.php" parsley-validate novalidate method="post">
					<div class="logo_txt2" align="center" colspan="3">
						<table>
							<tbody><tr>
								<td style="padding-left:0px;border: 0px; width:28%;" >
								
									<img src="intro/images/costpslogo.png" width="38" height="51" alt="cost.ps" style="float:left; padding-top:-15px" />
								</td>
								
								<td style="padding-right:5px;border: 0px;" >
									<span class="slash" style="margin-top:10px">|</span> 
									<span class="nafza">إسترجاع كلمة المرور</span>
								</td>
							</tr></tbody>
						</table>
						
					</div>
                        <p class="text-center">لا تقلق، سوف نرسل لك رسالة بالبريد الالكتروني لإعادة تعيين كلمة المرور الخاصة بك.</p>
                        <p class="text-center"> <a onClick="logIn();" style="cursor: pointer;">العودة إلى تسجيل الدخول</a> </p>
                        <hr style="margin:10px;"/>
					<div class="login_inputs" align="center">
						<div class="crids1" dir="rtl">
							<div class="form-group">
								<div class="col-sm-12">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
										<input type="email" placeholder="البريد الإلكتروني" name="email" id="email" class="form-control">
									</div>
								</div>
                        	</div>
						</div>
					</div>
			
					<div  class="lost_new" style="margin-top:10.5%;float:right;width:49.6%;margin-left:0.7%">
						<button class="forget_pass1" name="sub_pass" style="width:100%;">إسترجاع كلمة المرور</button>
					</div>
			</form>
					

					<div class="lost_new" style="margin-top: 10.5%;float:right;width:49.6%">
						<button class="log_in1" name="log_in" onClick="signUp();" style="width:100%;">مشترك جديد</button>
					</div>	
					
        </div>
    		</div>
		
		

			<!-- By RSR Start -->
			<div class="middle-slider">
				<div class="block-flat2">

					<!-- Insert to your webpage where you want to display the slider -->
					<div id="amazingslider-wrapper-1"
						style="display:block;position:relative;max-width:530px;margin:0px auto 48px;">
						<div id="amazingslider-1" style="display:block;position:relative;margin:0 auto;">
							<ul class="amazingslider-slides" style="display:none;">
								<li><img src="assetsReg/images/1.jpg" alt="خدمات محاسبية وإدارية"
										data-description="حلول المحاسبة والإدارة الأول من نوعها عبر الإنترنت" />
								</li>
								<li><img src="assetsReg/images/2.jpg" alt="خدمات شخصية وأسرية"
										data-description="خدمات مميزة نقدمها لأجلك وحدك" />
								</li>
								<li><img src="assetsReg/images/3.jpg" alt="خدمات محاسبية وإدارية"
										data-description="حلول المحاسبة والإدارة الأول من نوعها عبر الإنترنت" />
								</li>
								<li><img src="assetsReg/images/4.jpg" alt="خدمات شخصية وأسرية"
										data-description="خدمات مميزة نقدمها لأجلك وحدك" />
								</li>
							</ul>
							<ul class="amazingslider-thumbnails" style="display:none;">
								<li><img src="assetsReg/images/1.jpg" alt="خدمات محاسبية وإدارية" /></li>
								<li><img src="assetsReg/images/2.jpg" alt="خدمات شخصية وأسرية" /></li>
								<li><img src="assetsReg/images/3.jpg" alt="خدمات محاسبية وإدارية" /></li>
								<li><img src="assetsReg/images/4.jpg" alt="خدمات شخصية وأسرية" /></li>
							</ul>
							<div class="amazingslider-engine"><a href="http://amazingslider.com"
									title="Responsive JavaScript Image Slider">Responsive JavaScript Image Slider</a></div>
						</div>
					</div>
					<!-- End of body section HTML codes -->

				</div>

				<!--
				<div class="text-center out-links" style="color:#fff;text-shadow: 0px 0px 5px #000;">Powered by  © 2015 for </div>
				-->

			</div>
		</div>
    </div>
</template>

<script>
    export default {
        name: 'RegLogin',
    data() {
      return {
        user: {
          name: "",
          email: "",
          password: "",
          password_confirmation: "",
		  phone: "",
        },
		errors: [],
      };
    },

	  methods: {
		Register() {
		axios.post("api/Register", this.user).then((res) => {
			if (res.data.status == "error") {
			this.errors = res.data.errors;
			} else {
			this.errors = [];
			this.user.name = "";
			this.user.email = "";
			this.user.phone = "";
			this.user.password = "";
			this.user.password_confirmation = "";
			$('#log').click();
			}
			
		});
		},

	    Login() {
			axios.post("api/Login", this.user).then((res) => {
				if (res.data.status == "error") {
					this.errors = res.data.errors;
				}else {
					this.errors = [];
					this.user.email = "";
					this.user.password = "";
					window.location.href="http://127.0.0.1:8000/"
				}
				if (res.data.status !== "error") {
					var token = res.data.token;
					localStorage.setItem("token", token);
				}
				console.log(res);
      		})
    	},
  },
	   }
</script>