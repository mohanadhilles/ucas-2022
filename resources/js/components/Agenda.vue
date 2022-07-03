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
            <li class="agendaa">
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
            <nav class="top-nav arbah-nav">
                <ul>
                    <li class="selected">
                        <router-link to="">
                            <div></div>
                            <span>اليومية</span>
                        </router-link>

                        <div class="arrow"></div>
                    </li>
                    <li>
                        <router-link to="Monthly_arbah">
                            <div></div>
                            <span>الشهرية</span>
                        </router-link>

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

        <div class="report expense-report">
            <div class="div-title" style="background-color: #8e4449;">
                <span class="arbah-icon">الأربـاح اليومية</span>
                <!-- <span><router-link to="#" onclick="openForm()"> طباعة</router-link></span> -->
            </div>
            <div class="tables_ms">
                <input type="date" v-model="Search" @change="filteredpro()">
                <div>
                    <table style="margin-top: 8px;" class="table sms-table">
                        <thead>
                            <tr>
                                <th style="width:17px;border-right:none;background-color: #8e4449;">#</th>
                                <th style="width:156px;background-color: #8e4449;">الصنف</th>
                                <th style="width:115px;background-color: #8e4449;">الكمية</th>
                                <th style="width:121px;background-color: #8e4449;">سعر البيع</th>
                                <th style="width:119px;background-color: #8e4449;">سعر الجملة</th>
                                <th style="width:109px;background-color: #8e4449;">صافي الربح</th>
                            </tr>
                        </thead>
                    </table>
                </div>

                <div>
                    <table class="table sms-table">
                        <tbody style="height: 265px;">
                            <tr v-for="(Data , index) in dataIncome" :key="index" style="height: 38px;">
                                <td style="width:20px;border-right:none;">{{ index+1 }}</td>
                                <td style="width:23.7%;line-break: anywhere;">{{ Data.service }}</td>
                                <td style="width:18%;line-break: anywhere;">{{ Data.quantity }}</td>
                                <td style="width:18.7%;line-break: anywhere;">{{ Data.price }}</td>
                                <td style="width:18.6%;line-break: anywhere;">{{ Data.jomla_price }}</td>
                                <td style="width:17%;">{{ ( Data.price - Data.jomla_price ) * Data.quantity }}</td>
                            </tr>
                        </tbody>

                    </table>
                    <table class="table sms-table">
                        <tbody>
                            <tr>
                                <td style="background-color: #8e4449;width:83%;color: #ffffff;border-left: 1px solid #ffffff;" colspan="3">اجمالي الأرباح : </td>
                                <td style="background-color: #8e4449;width:342px;color: #ffffff;">{{ TotalM }} ₪</td>
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
   name: 'Msrofat',
   data: function() {
        return {
            dataService: [],
            dataIncome:[],
            errors: [],
            Data:{
                service_s:'ايفون',
                quantity:'',
                price:'',
                note:'',
                id:'',
                date: ''
            },
            setUser: '',
            Search: new Date().toISOString().substr(0, 10),
            
        };
    },
        computed:{
        TotalM() {
            let total = 0; 
            this.dataIncome.reduce((acc, item) => total += (item.price - item.jomla_price) * item.quantity, 0);
            localStorage.setItem('arbah' , total)
            return total
        }
    },
   methods:{
        getSer: function(){
            var token = localStorage.getItem("token");

            axios.get('api/getService?token=' + token)
            .then(res =>{
                this.dataService = res.data.data;
            })
            .catch((err)=>{
            console.log(err)
            })     
        },
        getIncome(){
            var token = localStorage.getItem("token");

            axios.get('api/getIncome?token=' + token)
            .then(res =>{
                this.dataIncome = res.data.data;
                console.log(res.data)
            })
            .catch((err)=>{
            console.log(err)
            })  
        },

    filteredpro() {
        var token = localStorage.getItem("token");

      axios
        .get(`api/Search/${this.Search}?token=` + token)
        .then((res) => {
          this.dataIncome = res.data;
          console.log(res.data)
        })
        .catch((err) => console.error(err));
    },
        Logout: function() {
        var token = localStorage.getItem("token");
        axios.post("http://127.0.0.1:8000/api/Logout?token=" + token, {}).then(res=>{
            localStorage.removeItem('token')
            window.location.href="http://127.0.0.1:8000/login"
        })
    },
   },
    mounted() {
        this.getSer();
        this.getIncome();
        this.filteredpro();
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