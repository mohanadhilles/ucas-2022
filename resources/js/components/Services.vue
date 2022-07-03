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
            <li class="servicess">
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
        <nav class="top-nav services-nav">
            <ul>
                <li class="selected">
                    <router-link to="services">
                        <div></div>
                        <span style="color: #504b41;
                        top: 5px;">تصنيفات </span>
                    </router-link>

                    <div class="arrow"></div>
                </li>
            </ul>
        </nav>
        <div class="you-know services-you-know">
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
    <div class="report expense-report2">
        <div class="div-title" style = "background-color: #1b79ba;">
            <span class="income-icon">التصنيفات </span>
            <span><router-link to="#" onclick="openFormService()"><i class="fa fa-plus"></i> اضافة</router-link></span>

            
            <div class="tables_inc2">
                <div>
                    <table style="margin-top: 8px;" class="table sms-table">
                        <thead>
                            <tr>
                                <th style="width:28px;">#</th>
                                <th style="width:413px;"> التصنيف</th>
                                <th style="width:234px;">السعر</th>
                                <th style="width:188px;">العمليات</th>
                            </tr>
                        </thead>
                    </table>
                </div>
    
                <div>
                    <table class="table sms-table">
                        <tbody style="height: 299px;">
                            <tr v-for="(Data , index) in dataService" :key="index">
                                <td style="width:20px;border-right:none;">{{index+1}}  </td>
                                <td style="width:292px;padding: 0px 6px 0px;line-break: anywhere;"> {{Data.service}} </td>
                                <td style="width:165px;">{{Data.jomla_price}} </td>
                                <td  style="width:140px;text-align: center;letter-spacing: 11px;    font: 14px / 12px ourFont;">
                                    <br>
                                    <button @click.prevent="deleted(Data.id)"  style="border: 0;font-size: 18px;" to=""><i id="edithover1" class="fa-solid fa-trash-can"></i></button>
                                    <button @click="edit(Data.id)" onclick="openFormEditService()"  style="border: 0;font-size: 18px;" to=""><i id="edithover" class="fa-solid fa-pen-to-square"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table sms-table">
                        <tbody>
                            <tr>
                                <td style="background-color: rgb(27, 121, 186) ;width:325px;color: #ffffff;border-left: 1px solid #ffffff;">المجموع :</td>
                                <td style="background-color: rgb(27, 121, 186) ;width:313px;color: #ffffff;">{{total}} ₪</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
    
            </div>
        </div>

        <!-- add -->
        <div class="form-popup-services" id="myForm">
            <form  class="form-container-services">
                <table  >     
                    <tr>
                    <td><label for="email"><b> التصنيف </b></label></td>
                    <td>
                        <input v-model="Data.service" type="text" placeholder="ادخل التصنيف" name="text" required> 
                        <samp v-if="errors.service" class="error_res" >{{ errors.service[0] }}</samp>
                    </td>
                    
                    </tr>

                    <tr>
                    <td><label for="psw"><b>السعر </b></label></td>
                    <td>
                        <input v-model="Data.jomla_price" type="number" placeholder="ادخل السعر" name="psw" required>
                        <samp v-if="errors.jomla_price" class="error_res">{{ errors.jomla_price[0] }}</samp>
                    </td>
                    
                    </tr>

                </table  >

                <button @click.prevent="addService()" type="submit" class="btn">اضافة</button>
                <button  id="close" type="button" class="btn cancel" onclick="closeFormService()">الغاء</button>
            </form>
        </div>
        <!-- edit -->
        <div class="form-popup-services" id="myFormEdit">
            <form  class="form-container-services">
                <table  >     
                    <tr>
                    <td><label for="email"><b> التصنيف </b></label></td>
                    <td>
                        <input v-model="Data.service" type="text" placeholder="ادخل التصنيف" name="text" required> 
                        <samp v-if="errors.service" class="error_res" >{{ errors.service[0] }}</samp>
                    </td>
                    
                    </tr>

                    <tr>
                    <td><label for="psw"><b>السعر </b></label></td>
                    <td>
                        <input v-model="Data.jomla_price" type="number" placeholder="ادخل السعر" name="psw" required>
                        <samp v-if="errors.jomla_price" class="error_res">{{ errors.jomla_price[0] }}</samp>
                    </td>
                    
                    </tr>

                </table  >

                <button @click.prevent="update()" type="submit" class="btn">تعديل</button>
                <button  id="closeE" type="button" class="btn cancel" onclick="closeFormEditService()">الغاء</button>
            </form>
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
    name: 'Services',
    data: function() {
        return {
            Data:{
                id: '',
                service: '',
                jomla_price: ''
            },
            dataService: [],
            errors: [],
            search: '',
            setUser: '',
        };
    },
    computed:{
        total() {
            let total = 0;
            this.dataService.reduce((acc, item) => total += 1 * item.jomla_price, 0);
            return total;
        }
    },
    methods: {
        addService(){
            var token = localStorage.getItem("token");

            const Data = {
                service: this.Data.service,
                jomla_price: this.Data.jomla_price,
                user_id: this.setUser.id,
            };

            axios.post("api/addService?token=" + token , Data)
            .then(res=>{
				if(res.data.status == "error"){
                    this.errors = res.data.error;
                }else{
                    this.errors = []
                    this.Data.service = ''
                    this.Data.jomla_price = ''
                    $('#close').click();
                    this.getSer();
                }
			})
        },

        getSer: function(){
            var token = localStorage.getItem("token");

            axios.get('api/getService?token=' + token)
            .then(res =>{
                this.dataService = res.data.data;
                console.log(res.data)
            })
            .catch((err)=>{
            console.log(err)
            })     
        },

        deleted(id){
            var token = localStorage.getItem("token");
            axios.delete(`api/delete/${id}?token=` + token)
              .then(response => {
                console.log(response.data) 
                this.getSer();
            })

            
        },
        // edit(Data){
        //     this.Data = Data
        // },
        edit(id){
            var token = localStorage.getItem("token");
            axios.get(`api/getService/${id}?token=` + token)
            .then(response => {
                this.Data = response.data.data
                console.log(response.data.data) 
            })
        },
        update(){
            var token = localStorage.getItem("token");
            const Data = {
                service: this.Data.service,
                jomla_price: this.Data.jomla_price,
                user_id: this.setUser.id,
            };
            axios.put(`api/update/${this.Data.id}?token=` + token , Data)
            .then(res=>{
				if(res.data.status == "error"){
                    this.errors = res.data.error;
                }else{
                    console.log(res.data) 
                    this.errors = []
                    this.Data.service = ''
                    this.Data.jomla_price = ''
                    $('#closeE').click();
                    this.getSer();
                    
                }
			})
        },

        searchData: function(val){
            var token = localStorage.getItem("token");

			axios.get(`api/searchSer/${val}?token=` + token)
			.then((res)=> this.dataService = res.data)
			
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
    mounted() {
        this.getSer();
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



<style >
.error_res{
    background-color: red;
    color: #fff;
    font-size: 15px;
    border-radius: 3px;
    margin: 0px 10px;
}   
</style>