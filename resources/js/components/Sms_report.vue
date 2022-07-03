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
            <input style="font: 14px / 20px ourFont;font-weight: bold;color: #aaaab5;" class="search-input" v-model="search" type="search" placeholder="  بحث ..."/>
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
<div class="main_content inner">
    <div class="top-div">
        <nav class="top-nav sms-nav">
            <ul>
                <li >
                    <router-link to="sms">
                        <span>Mail</span>
                        <i class="fa fa-comment"></i>
                        <i class="fa fa-mobile"></i>
                        <span>ارسال رسالة</span>
                    </router-link>

                    <div class="arrow"></div>
                </li>
                 <li class="selected">
                    <router-link to="sms_report">
                    <i class="fa fa-file-text"></i>
                        <span class="selsel" style="top: 6px"> التقارير</span>
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
    <div class="report sms">

        <div class="div-title" id="mainsms">
            <i class="fa fa-file-text"></i>
            <span>تقارير الرسائل</span>
            <!-- <span>
                <a>
                    <i class="fa fa-print"></i>
                    طباعة 
                </a>
            </span> -->

            <div class="arrow"></div>
        </div>

        <div class="tables">

            <div>
                <table style="margin-top: 8px;" class="table sms-table">
                    <thead>
                    <tr>
                        <th style="width:17px;border-right:none;">#</th>
                        <th style="width:140px;">المرسل اليه</th>
                        <th style="width:176px;">عنوان الرسالة</th>
                        <th style="width:281px;"> نص الرسالة</th>
                        <th style="width:115px;">تاريخ الإرسال</th>
                    </tr>
                    </thead>
                </table>
            </div>

            <div>
                <table class="table sms-table">
                    <tbody style="height: 324px;">
                    <tr v-for="(Data , index) in dataMessage" :key="index">
                        <td style="width:4%;border-right:none;">{{ index+1 }}</td>
                        <td style="width:22%;line-break: anywhere;">{{Data.name_cus}}</td>
                        <td style="width:27.9%;line-break: anywhere;">{{Data.address_msg}}</td>
                        <td style="width:43%;line-break: anywhere;">{{Data.message}}</td>
                        <td style="width:6%;    font-family: fangsong;font-size: 17px;min-width: 99px;">{{ (Data.created_at).slice(0,19) }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>

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
    name: 'Sms_report',
    data(){
    return {
        
        dataMessage: {},
        Data:{
            name_cus:'',
            address_msg:'',
            message:'',
            id:'',
            date_ms: new Date().toISOString().substr(0, 10),
        },
        search: '',
        setUser: '',
    }
    },
    methods: {
        getMessage(){
            var token = localStorage.getItem("token");

            axios.get('api/getMessage?token=' + token)
            .then(res =>{
                this.dataMessage = res.data.data;
                console.log(res.data)
            })
            .catch((err)=>{
            console.log(err)
            })  
        },
        searchData: function(val){
            var token = localStorage.getItem("token");

			axios.get(`api/searchMail/${val}?token=` + token)
			.then((res)=> this.dataMessage = res.data)
			
		},
            Logout: function() {
        var token = localStorage.getItem("token");
        axios.post("http://127.0.0.1:8000/api/Logout?token=" + token, {}).then(res=>{
            localStorage.removeItem('token')
            window.location.href="http://127.0.0.1:8000/login"
        })
    },
    },
    watch: {
		search: function(){
			this.searchData(this.search)
		}
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
        this.getMessage();
  	},
}
</script>
