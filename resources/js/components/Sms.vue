<template>
    <div>
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
            <li class="mobile-balance">
                <router-link to="contact">
                    <div></div>
                    <div> جهات الإتصال</div>
                    <div></div>
                </router-link>
            </li>
            <li class="messagess">
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
<div class="main_content inner" >
    <div class="top-div" >
        <nav class="top-nav sms-nav" >
            <ul>
                <li class="selected">
                    <router-link to="sms">
                        <span>Mail</span>
                        <i class="fa fa-comment"></i>
                        <i class="fa fa-mobile"></i>
                        <span>ارسال رسالة</span>
                    </router-link>

                    <div class="arrow"></div>
                </li>
                <li>
                    <router-link to="sms_report">
                        <i class="fa fa-file-text"></i>
                        <span>التقارير</span>
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
    <div class="report sms" style="background: none;">
        <div class="send-message">
            <div class="div-title" id="mainsms">
                <span class="sms-icon">رسائل البريد الالكتروني</span>
                
                <!-- <span style="top: -7.5px;">
                    <router-link to="">رسائل Mail</router-link>
                </span> -->

            </div>
<br>
            <form action=""  >

                <p>
                    <span>عنوان الرسالة </span>
                    <textarea name="number" v-model="Data.address_msg" id="number"></textarea>
                </p>

                <p>
                    <span>الرسالة</span>
                    <textarea name="msg" v-model="Data.message" id="msg"></textarea>
                </p>		
                <p>
                </p>
                <p>
                <span class="sender-name">
                    <router-link to="#">
                    <select class="balance-class" v-model="Data.name_cus" style="width: 100%;font: 13px / 20px ourFont;background: #d77b31;border: 0;" >
                        <option v-for="item in dataMessage"  :key="item.id" :value="item.name" >{{item.name}}</option>
                    </select>
                    </router-link>
                </span>
                    <input type="submit" @click.prevent="sendMessage()" id = "send" class = "send_sms" value="ارسل الان" />
                <span>
                    
                </span>

                </p>
            </form>
        </div>
        
    </div>

        




    <div id="foot-ads" class="footer-ads">
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
        name: 'Sms',
        data(){
            return {
                dataMessage: [],
                Data:{
                 name_cus:'',
                 address_msg:'',
                 message:'',
                 id:'',
                 date_ms: new Date().toISOString().substr(0, 10),
            },
            setUser: '',
            }
        },
        methods: {
            getCon: function(){
                var token = localStorage.getItem("token");
                
                axios.get('api/getContact?token=' + token)
                .then(res =>{
                    this.dataMessage = res.data.data;
                    console.log(res.data)
                })
                .catch((err)=>{
                console.log(err)
                })   
                
            },
        sendMessage: function(){
            var token = localStorage.getItem("token");
            const Data = {
                name_cus: this.Data.name_cus,
                address_msg: this.Data.address_msg,
                message: this.Data.message,
                date_ms: this.Data.date_ms,
                user_id: this.setUser.id,
            };
            axios.post("api/sendMessage?token=" + token , Data)
            .then(res=>{
                    console.log(res.data) 
                    this.Data.name_cus = ''
                    this.Data.address_msg = ''
                    this.Data.message = ''
                
			})
        },
            Logout: function() {
                var token = localStorage.getItem("token");
                axios.post("http://127.0.0.1:8000/api/Logout?token=" + token, {}).then(res=>{
                    localStorage.removeItem('token')
                    window.location.href="http://127.0.0.1:8000/login"
                })
            },
        },
        mounted(){
            this.getCon()
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


    }
</script>