<template>
    <div>
          <MyHeader />

        <div class="main_content">
            <div class="monthly-expense">
                <div class="chart-title" > الإستهلاك الشهري</div>
                <img src="img/monthly-expenses-chart.png">
            </div>
            <div class="r_column float-right">
                <div class="ads">
                    <div class="div-title">
                        <div><i class="fa fa-bullhorn"></i>الاعلانات</div>
                    </div>
                    <div class="ads-body">
                        لا يخفى أن اللغة العربية لغة الدين الإسلامي، لغة القرآن المجيد، لغة الحديث الشريف، ل
                        غة التدوين والتأليف في الإسلام، لغة التخاطب والتفاهم بين سائر المسلمين في الدنيا والآخرة، فهي الصلة بين
                        الله تعالى وعباده وبين رسوله وأمته وبين شرعه وعباده، وبين الأوائل والأواخر، وبين الغائبين والحاضرين.
                    </div>
                </div>

                <div class="agenda">
                    <div class="div-title">
                        <div><i class="fa fa-calendar"></i> أجندة المواعيد</div>
                    </div>
                    <div class="date-picker ll-skin-melon"></div>
                </div>
            </div>

            <div class="l_column float-right">
                <div class="container-tab">
                    <div class="cd-tabs">
                        <nav>
                            <ul class="cd-tabs-navigation">
                                <li class="div-title">
                                    <router-link data-content="currency-rates" class="selected" to="">
                                        <i class="fa fa-usd"></i> اسعار العملات
                                    </router-link>

                                </li>
                                <li class="div-title">
                                    <router-link data-content="prayer-times" to=""><i class="fa fa-moon-o"></i> اوقات
                                        الصلاة</router-link>

                                </li>
                                <li class="div-title">
                                    <router-link data-content="temperature" to=""><i class="fa fa-tint"></i> درجات
                                        الحرارة</router-link>

                                </li>
                            </ul>
                        </nav>
                        <ul class="cd-tabs-content">
                            <!-- table العملة -->
                            <li data-content="currency-rates" class="selected">
                                <div>
                                    <table class="tableimla" style = "border: 3px solid #EF5252; text-align: center; width: 100%; height: 150px; background-color: rgb(241, 241, 241);">
                                        <thead>
                                        <tr class="trtable">
                                            <th class="theadd">العملة</th>
                                            <th class="theadd">الدولار</th>
                                            <th class="theadd">الدينار</th>
                                            <th class="theadd">اليورو</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td class="tbdy">البيع</td>
                                            <td class="tbdyw" id="USD">{{(shekel-0.02)*100}}</td>
                                            <td class="tbdyw" id="JOD">{{((dinar-0.02)*100).toFixed(0) }}</td>
                                            <td class="tbdyw" id="EUR">{{((euro-0.02)*100).toFixed(0) }}</td>
                                        </tr>
                                        <tr>
                                            <td class="tbdy">الشراء</td>
                                            <td class="tbdyw" id="USD_Buy">{{ shekel*100 }}</td>
                                            <td class="tbdyw" id="JOD_Buy">{{(dinar*100).toFixed(0)}}</td>
                                            <td class="tbdyw" id="EUR_Buy">{{(euro*100).toFixed(0)}}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </li>
                            
                            <!-- table الصلاه -->
                            <li data-content="prayer-times">
                                <div id="table">
                                <div>
                                    <table style = "border: 3px solid #00baff; text-align: center; width: 100%; height: 150px; background-color: rgb(241, 241, 241);">
                                        <thead>
                                        <tr>
                                            <th style = "border: 2px solid white; font-size: 16px; background-color: #00baff; color:white;">الفجر</th>
                                            <th style = "border: 2px solid white; font-size: 16px; background-color: #00baff; color:white; text-align: center; height: 40px;">الظهر</th>
                                            <th style = "border: 2px solid white; font-size: 16px; background-color: #00baff; color:white; text-align: center;">العصر</th>
                                            <th style = "border: 2px solid white; font-size: 16px; background-color: #00baff; color:white; text-align: center;">المغرب</th>
                                            <th style = "border: 2px solid white; font-size: 16px; background-color: #00baff; color:white; text-align: center;">العشاء</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td style = "border: 2px solid white; font-size: 16px; font-weight: bold; color:white;"></td>
                                            <td class="USD" id="USD" style = "border: 2px solid white; font-size: 16px; text-align: center; height: 50px;"></td>
                                            <td class="JOD" id="JOD" style = "border: 2px solid white; font-size: 16px; text-align: center;"></td>
                                            <td class="EUR" id="EUR" style = "border: 2px solid white; font-size: 16px; text-align: center;"></td>
                                        </tr>

                                        </tbody>
                                    </table>
                                </div>
                                </div>
                            </li>
                           
                            <!-- الحرارة -->
                            <li data-content="temperature">

                                <iframe id="forecast_embed" style="margin-right: 19px;width: 92%;" type="text/html" frameborder="0" height="145" width="380" src="http://forecast.io/embed/#lat=31.522561&lon=34.453593&name=Gaza&color=#98CA20&font=Georgia&units=uk&language=ar"> </iframe>

                            </li>
                        </ul>
                    </div>
                </div>
                <div class="income-chart">
                    <div class="div-title">
                        <div><i class="fa fa-pie-chart"></i> المصروفات و الايرادات</div>
                    </div>
                    <div>
                        <div class="chart-data">
                            <div>
                                <span>ايرادات</span>
                                <span> : {{incomes}}</span>
                            </div>

                            <div>
                                <span>المصروفات</span>
                                <span> : {{msrofat}}</span>
                            </div>
                            
                            <div>
                                <span>باقي الاستهلاك</span>
                                <span> : {{ incomes - msrofat }} </span>
                            </div>
                        </div>
                        <div class="chart">
                            <img src="img/income-chart.png">
                        </div>
                    </div>
                </div>
            </div>
        </div>   
    </div>
</template>

<script>
import MyHeader from "./MyHeader";

export default {
    name: 'Home',
    data(){
        return {
            
             msrofat: localStorage.getItem('msrofat') ,
             incomes: localStorage.getItem('incomes') ,
            
            
            ILS: 'ILS',
            JOD: 'JOD',
            USD: 'USD',
            EUR:'EUR',

            doller: 1,
            shekel: null,
            sh: '',


            dinar: null,
            d:'',

            euro: null,
            e: '',
        }
    },
    methods: {
        getData: function(){
            axios.get('https://api.exchangerate-api.com/v4/latest/USD')
            .then(res => {
                // console.log(res.data.rates.JOD);  

                this.sh = res.data.rates[this.ILS];
                this.shekel = this.doller * this.sh;

                this.d = res.data.rates[this.JOD];
                this.dinar = (this.doller / this.d) * this.shekel;

                this.e = res.data.rates[this.EUR];
                this.euro = (this.doller / this.e) * this.shekel;
            })
        }
    },
    mounted(){
        this.getData()
        // if(localStorage.getItem('token')){
		// 	axios.defaults.headers.common["Authorization"] = 'Bearer ' + localStorage.getItem('token');
		// } 
		// else{
		//   window.location.href="http://127.0.0.1:8000/login"
		// }
    },
     components: { MyHeader },

     created(){
		
  	},
}
</script>