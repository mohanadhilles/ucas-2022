<template>

    <div class="container">
          <header class="float-left">
    
        <div class="lang float-right" style="text-align: center;" >
                <div class="time">
                    <span class="hms"></span>
                    <span class="ampm"></span>&nbsp;&nbsp;
                    <span class="date"></span>
                  </div> 
        </div>
        <div class="search float-right">
            <input style="font: 14px / 20px ourFont;font-weight: bold;color: #aaaab5;" class="search-input" type="search" placeholder="  بحث ..."/>
            <i class="fa fa-search"></i>
        </div>
        <div class="user-panel float-right">
            <ul class="top">
                <li class="user-name">
                    <router-link to="#">
                        <img src="userfiles/user-pic/icon-user-default.png" />
                        <span class="name" v-if="setUser">مرحباً,{{setUser.name}} </span>

                    </router-link>
                </li>
            </ul>
        </div>
        <div class="logout float-right">
            <router-link to=""> <i class="fa fa-power-off"></i> <span @click="Logout()">تسجيل الخروج</span> </router-link>
        </div>
    </header>
    <nav class="main_nav">
        <div class="logo">
            <router-link to="/">
                <img src="img/logo.png"/>
            </router-link>
        </div>
        <ul>
            <li class="mobile">
                <router-link to="contact">
                    <div></div>
                    <div> جهات الإتصال</div>
                    <div></div>
                </router-link>
            </li>
            <li class="messages">
                <router-link to="sms">
                    <div></div>
                    <div> رسائل <br>  البريد الالكتروني</div>
                    <div></div>
                </router-link>
            </li>
            <li class="expenses">
                <router-link to="msrofat">
                    <div></div>
                    <div> المصروفات</div>
                    <div></div>
                </router-link>
            </li>
            <li class="income">
                <router-link to="incomes">
                    <div></div>
                    <div> الايرادات</div>
                    <div></div>
                </router-link>
            </li>
            <li class="services">
                <router-link to="services">
                    <div></div>
                    <div>التصنيفات</div>
                    <div></div>
                </router-link>
            </li>
            <li class="agenda">
                <router-link to="agenda">
                    <div></div>
                    <div> الأرباح <br> المواعيد</div>
                    <div></div>
                </router-link>
            </li>
        </ul>
    </nav>
<!--end header-->
        <div class="main_content inner">
    <div class="top-div">
        <nav class="top-nav contact-nav">
            <ul>
                <li class="selected">
                    <router-link to="contact">
                        <i style="color: #504b41; top: 15px;" class="fa fa-user"></i>
                        <span style="color: #504b41; top: 9px;">جهات الاتصال</span>
                    </router-link>

                    <div class="arrow"></div>
                </li>
                <li>
                    <router-link to="">
                        <i class="fa fa-clipboard"></i>
                        <span>تصدير</span>
                    </router-link>

                    <div class="arrow"></div>
                </li>
            </ul>
        </nav>
        <div class="you-know">
            <div class="vertical-title">
                <div>هل تعلم !</div>
                <div class="arrow-2"></div>
            </div>
            <div class="inform">
                <ul>
                    <li> من خلال نافذة تحويل الرصيد بإمكانك تحويل من 5 شواكل حتى 500 شيكل في عملية تحويل واحدة</li>
                </ul>
            </div>
        </div>
        <div class="clear"></div>
    </div>

    <div class="contact-lists">

        <div class="div-title">
            <i class="fa fa-user"></i>
            <span>جهات الاتصال والمواعيد</span>

        </div>


        <div>
            <div class="contact-person">
                <!-- <div class="name">محمود الحاج احمد</div> -->
				
                <form method = "post" action = "">
                    <div class="float-right">
					
                        <p>
                            <label for="">الاسم</label><span>*</span>
                            <input v-model="Data.name" type="text" name="name"/>
                            <!-- <samp v-if="errors.name" class="error_res">{{ errors.name[0] }}</samp> -->
                        </p>

                        <p>
                            <label for="">البريد الالكتروني</label>
                            <input v-model="Data.email" type="text" name="email"/>
                            <!-- <samp v-if="errors.email" class="error_res">{{ errors.email[0] }}</samp> -->
                        </p>

                        <p>
                            <label for="">رقم الجوال</label><span>*</span>
                            <input v-model="Data.phone" type="text" name="mobile"/>
                            <!-- <samp v-if="errors.phone" class="error_res">{{ errors.phone[0] }}</samp> -->
                        </p>
						<p>

                        </p>
                        <p>
                            <label for="">الصورة</label>
                            <input @change="selectFile" type="file" name="image"/>
                        </p>

                        <p>
                            <label for="">العنوان</label>
                            <input v-model="Data.address" type="text" name="address"/>
                        </p>

                        <p>
                            <label for="">ملاحظات</label>
                            <textarea v-model="Data.notes" cols="5" rows="5" name="notes"></textarea>
							
							
							<input type="hidden" name="id" value=""/>
                        </p>

                        <p>
                            
                            <input @click.prevent="addContact()" type="submit" value="إضافة  جديد" >
                        </p>
                    </div>
                    <div v-if="iamgePreview" class="float-left-img-contact">
                        <div class="img-avatar">
                            <img :src="iamgePreview" />
                        </div>
                    </div>
                </form>

            </div>
			
			
			
			
            <div class="clear"></div>
        </div>
    </div>



    <div class="footer-ads">
        <div class="vertical-title">
            <div>نافذة الاعلانات</div>
            <div class="arrow-2"></div>
        </div>
        <div class="the-ads">
            <img src="img/ads.png"
                 style="width: 100%; height: 130px; position: relative; top: -8px; left: -0.3%; border-right: 5px;">

        </div>
    </div>
</div>

    </div>
</template>

<script>
    export default {
        name:'Contact',
        data: function() {
            return {
                Data:{
                    name: '',
                    email: '',
                    phone: '',
                    address: '',
                    notes: '',
                    img: '',
                },
                errors: [],
                iamgePreview: null,
                setUser: '',
            };
        },
        created(){
		axios.get('http://127.0.0.1:8000/api/user',{
			headers: {
				Authorization : 'Bearer ' + localStorage.getItem('token')
			}
		
		})
		.then(res => {
            this.setUser = res.data
            console.log(res.data)
        } )
		.catch(err => console.error( err + ': Not User |  Unauthorized') );
        
  	},
        methods: {
            addContact(){
                var token = localStorage.getItem("token");
                let formData = new FormData();
                formData.append('name', this.Data.name);
                formData.append('email', this.Data.email);
                formData.append('phone', this.Data.phone);
                formData.append('address', this.Data.address);
                formData.append('notes', this.Data.notes);
                formData.append('img', this.Data.img);
                formData.append('user_id', this.setUser.id);

                axios.post("api/addContact?token=" + token , formData)
                .then(res=>{
                    if(res.data.status == "error"){
                        this.errors = res.data.error;
                    }else{
                        console.log(res.data)
                        this.errors = []
                        this.Data.name = ''
                        this.Data.email = ''
                        this.Data.phone = ''
                        this.Data.address = ''
                        this.Data.notes = ''
                        this.Data.img = null
                    }
                })
            },
            selectFile: function(event){
                this.Data.img = event.target.files[0];
                console.log(this.Data.img)

                let reader = new FileReader();
                reader.readAsDataURL(this.Data.img)
                reader.onload = e => {
                    this.iamgePreview = e.target.result;
                }
            },
                    Logout: function() {
            var token = localStorage.getItem("token");
            axios.post("http://127.0.0.1:8000/api/Logout?token=" + token, {}).then(res=>{
                localStorage.removeItem('token')
                window.location.href="http://127.0.0.1:8000/login"
            })
        },

        }
    }
</script>
