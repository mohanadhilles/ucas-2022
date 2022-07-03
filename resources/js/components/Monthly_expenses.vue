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
            <li class="expensess">
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
        <nav class="top-nav expenses-nav">
            <ul>
                <li >
                    <router-link to="msrofat">
                        <div></div>
                        <span>اليومية</span>
                    </router-link>
                </li>
                <li class="selected">
                    <router-link to="monthly_expenses">
                        <div></div>
                        <span>الشهرية</span>
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


    <div class="report expense-report">
        <div class="div-title">
            <span class="expense-icon">المصروفات الشهرية</span>
             <span><router-link to="#" onclick="openFormMsrofat()"><i class="fa fa-plus"></i> اضافة</router-link></span>
                <!-- pop up add -->
                <div class="form-popup" id="myForm">
                    <form action="" class="form-container-msrofat">
                        <table  >
                            <tr>
                                <td><label for="email"><b>الصنف </b></label></td>
                                <td class="box-form">     
                                    <select v-model="Data.service_s">
                                        <option  v-for="item in dataService" :key="item.id" :value="item.id">{{ item.service }}</option>
                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <td><label for="psw"><b>الكمية </b></label></td>
                                <td>
                                    <input v-model="Data.quantity" type="number" placeholder="ادخل الكمية" name="psw" required>
                                    <samp v-if="errors.quantity" class="error_res" >{{ errors.quantity[0] }}</samp>
                                </td>
                            </tr>

                            <tr>
                                <td><label for="psw"><b> السعر </b></label></td>
                                <td>
                                    <input v-model="Data.price" type="number" placeholder="ادخل السعر" name="psw" required>
                                    <samp v-if="errors.price" class="error_res" >{{ errors.price[0] }}</samp>
                                </td>
                            </tr>

                            <tr>
                                <td> <label for="psw"><b> ملاحظة </b></label></td>
                                <td>
                                    <input v-model="Data.note" type="text" placeholder="ادخل ملاحظة" name="psw" > 
                                </td>
                            </tr>
                        </table>
                        <button @click.prevent="addMsrofat()" type="submit" class="btn">اضافة</button>
                        <button id="close" type="button" class="btn cancel" onclick="closeFormMsrofat()">الغاء</button>
                    </form>
                </div>

                <!-- pop up edit -->
                <div class="form-popup" id="myFormEdit">
                    <form action="" class="form-container-msrofat">
                        <table  >
                            <tr>
                                <td><label for="email"><b>الصنف </b></label></td>
                                <td class="box-form">     
                                    <select v-model="Data.service_s">
                                        <option  v-for="(item , index) in dataService" :key="index" :value="item.id">{{ item.service }}</option>
                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <td><label for="psw"><b>الكمية </b></label></td>
                                <td>
                                    <input v-model="Data.quantity" type="number" placeholder="ادخل الكمية" name="psw" required>
                                    <samp v-if="errors.quantity" class="error_res" >{{ errors.quantity[0] }}</samp>
                                </td>
                            </tr>

                            <tr>
                                <td><label for="psw"><b> السعر </b></label></td>
                                <td>
                                    <input v-model="Data.price" type="number" placeholder="ادخل السعر" name="psw" required>
                                    <samp v-if="errors.price" class="error_res" >{{ errors.price[0] }}</samp>
                                </td>
                            </tr>

                            <tr>
                                <td> <label for="psw"><b> ملاحظة </b></label></td>
                                <td>
                                    <input v-model="Data.note" type="text" placeholder="ادخل ملاحظة" name="psw" required> 
                                </td>
                            </tr>
                        </table>
                        <button @click.prevent="update()" type="submit" class="btn">تعديل</button>
                        <button id="closeE" type="button" class="btn cancel" onclick="closeFormEditMsrofat()">الغاء</button>
                    </form>
                </div>


        </div>
        <div class="tables_ms">
            <input type="month" value="" min="2020-06" v-model="Searchms" @change="filteredpro()" style="background-color: #c82b4d;">


            <div>
                <table style="margin-top: 8px;" class="table sms-table">
                    <thead>
                    <tr>
                        <th style="width:20px;border-right:none;">#</th>
                        <th style="width:268px;"> الصنف</th>
                        <th style="width:116px;">الكمية </th>
                        <th style="width:139px;">سعر الوحدة</th>
                        <th style="width:136px;">المجموع</th>
                        <th style="width:307px;line-break: anywhere;">ملاحظات</th>
                        <th style="width:192px;">التاريخ/الوقت</th>
                        <th style="width:211px;">العمليات</th>



                    </tr>
                    </thead>
                </table>
            </div>

            <div>
                <table class="table sms-table">
                    <tbody style="height: 266px;">
                    <tr v-for="(Data , index) in dataMsrofat" :key="index">
                        <td style="width:3%;border-right:none;">{{ index+1 }}</td>
                        <td style="width:251px;line-break: anywhere;">{{ Data.service }}</td>
                        <td style="width:147px;line-break: anywhere;">{{ Data.quantity }}</td>
                        <td style="width:172px;line-break: anywhere;">{{ Data.price }}</td>
                        <td style="width:186px;line-break: anywhere;">{{Data.price*Data.quantity}}</td>
                        <td style="width:233px;line-break: anywhere;">{{ Data.note }} </td>
                        <td style="width: 130px;font-size: 14px;font-family: none;">{{ Data.created_at }}</td>
                        <td style="width:210px;text-align: center;letter-spacing: 11px;">
                                    <button @click.prevent="deleted(Data.id)" style="border: 0;font-size: 18px;" to=""><i id="edithover1" class="fa-solid fa-trash-can"></i></button>
                                    <button @click="edit(Data.id)" onclick="openFormEditMsrofat()" style="border: 0;font-size: 18px;" to=""><i id="edithover" class="fa-solid fa-pen-to-square"></i></button>                                </td> 

                    </tr>
                    
                    </tbody>
                </table>
                <table class="table sms-table">
                        <tbody>
                            <tr>
                                <td style="background-color: #c82b4d;width:300px;color: #ffffff;border-left: 1px solid #ffffff;" colspan="3">اجمالي المصروفات :</td>
                                <td style="background-color: #c82b4d;width:372px;color: #ffffff;">{{ totalEx }} ₪</td>
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
    name: 'Monthly_expenses',
   data: function() {
        return {
            dataService: [],
            dataMsrofat:[],
            errors: [],
            Data:{
                service_s:'ايفون',
                quantity:'',
                price:'',
                note:'',
                id:'',
                date_md: new Date().toISOString().substr(0, 10),
            },
            search: '',
            Searchms: new Date().toISOString().substr(0,7),
            setUser: '',
        };
    },
    computed:{
        totalEx() {
            let total = 0; 
            this.dataMsrofat.reduce((acc, item) => total += item.quantity * item.price, 0);
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
        addMsrofat(){
            var token = localStorage.getItem("token");

            const Data = {
                service_s: this.Data.service_s,
                quantity: this.Data.quantity,
                price: this.Data.price,
                note: this.Data.note,
                date_md: this.Data.date_md,
                user_id: this.setUser.id,
            };

            axios.post("api/addMsrofat?token=" + token , Data)
            .then(res=>{
				if(res.data.status == "error"){
                    this.errors = res.data.error;
                }else{
                    console.log(res.data) 
                    this.errors = []
                    this.Data.service_s = ''
                    this.Data.quantity = ''
                    this.Data.price = ''
                    this.Data.note = ''
                    $('#close').click();
                    this.getSer();
                    this.getMsrofat();
                }
			})
        },

        getMsrofat(){
            var token = localStorage.getItem("token");
            axios.get('api/getMsrofat?token=' + token)
            .then(res =>{
                this.dataMsrofat = res.data.data;
                console.log(res.data)
            })
            .catch((err)=>{
                console.log(err)
            })  
        },

        deleted(id){
            var token = localStorage.getItem("token");
            axios.delete(`api/deleteM/${id}?token=` + token)
              .then(response => {
                console.log(response.data) 
                this.getSer();
                this.getMsrofat();
            })   
        },
        edit(id){
            var token = localStorage.getItem("token");
            axios.get(`api/getMsrofat/${id}?token=` + token)
            .then(response => {
                this.Data = response.data.data
                console.log(response.data.data) 
            })
        },
        update(){
            var token = localStorage.getItem("token");

            const Data = {
                service_s: this.Data.service_s,
                quantity: this.Data.quantity,
                price: this.Data.price,
                note: this.Data.note,
                date_md: this.Data.date_md,
                user_id: this.setUser.id,
            };

            axios.put(`api/updateM/${this.Data.id}?token=` + token, Data)
            .then(res=>{
				if(res.data.status == "error"){
                    this.errors = res.data.error;
                }else{
                    console.log(res.data) 
                    this.errors = []
                    this.Data.service_s = ''
                    this.Data.quantity = ''
                    this.Data.price = ''
                    this.Data.note = ''
                    $('#closeE').click();
                    this.getSer();
                    this.getMsrofat();
                }
			})
        },
        searchData: function(val){
            var token = localStorage.getItem("token");
			axios.get(`api/searchMS/${val}?token=` + token)
			.then((res)=> {
                this.dataMsrofat = res.data,
                console.log(res.data)  
            })
			
		},

        filteredpro() {
            var token = localStorage.getItem("token");
            axios
            .get(`api/Searchms/${this.Searchms}?token=` + token)
            .then((res) => {
            this.dataMsrofat = res.data;
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
    watch: {
		search: function(){
			this.searchData(this.search)
		}
	},
    mounted() {
        this.getSer();
        this.getMsrofat();
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