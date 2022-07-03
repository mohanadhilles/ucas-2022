
window.Vue = require('vue').default;

import VueRouter from 'vue-router'

Vue.use(VueRouter)

import MyHeader from "./components/MyHeader";
import MyFooter from "./components/MyFooter";

import Home from "./components/Home";
import Contact from "./components/Contact";
import Sms from "./components/Sms";
import Sms_report from "./components/Sms_report";
import Msrofat from "./components/Msrofat";
import Monthly_expenses from "./components/Monthly_expenses";
import Incomes from "./components/Incomes";
import Monthly_incomes from "./components/Monthly_incomes";
import Services from "./components/Services";
import Agenda from "./components/Agenda";
import Instructions from "./components/Instructions";
import Contact_us from "./components/Contact_us";
import Monthly_arbah from "./components/Monthly_arbah";


import RegHeader from "./components/RegHeader";
import RegLogin from "./components/RegLogin";


const routes = [
    { path: '/', component: Home },
    { path: '/contact', component: Contact },
    { path: '/sms', component: Sms },
    { path: '/sms_report', component: Sms_report },
    { path: '/msrofat', component: Msrofat },
    { path: '/monthly_expenses', component: Monthly_expenses },
    { path: '/incomes', component: Incomes },
    { path: '/monthly_incomes', component: Monthly_incomes },
    { path: '/services', component: Services },
    { path: '/agenda', component: Agenda },
    { path: '/instructions', component: Instructions },
    { path: '/contact_us', component: Contact_us },
    { path: '/monthly_arbah', component: Monthly_arbah },


    { path: '/regHeader', component: RegHeader },
    { path: '/regLogin', component: RegLogin },

];

const router = new VueRouter({
    mode:"history",
    routes // short for `routes: routes`
})

const app = new Vue({
    el: '#app',
    data () {
        return {
            polling: null
        }
    },
    router,
    components:{
        MyHeader,
        MyFooter,
        Home,
        Contact,
        Sms,
        Sms_report,
        Msrofat,
        Monthly_expenses,
        Incomes,
        Monthly_incomes,
        Services,
        Agenda,
        Instructions,
        Contact_us,
        Monthly_arbah,

        RegHeader,
        RegLogin,
    },
    methods:{
        updateTime() {
            this.polling = setInterval(() => {
            var dateInfo = new Date();
            var hr,
                _min = (dateInfo.getMinutes() < 10) ? "0" + dateInfo.getMinutes() : dateInfo.getMinutes(),
                sec = (dateInfo.getSeconds() < 10) ? "0" + dateInfo.getSeconds() : dateInfo.getSeconds(),
                ampm = (dateInfo.getHours() >= 12) ? "م" : "ص";

            if (dateInfo.getHours() == 0) {
                hr = 12;
            } else if (dateInfo.getHours() > 12) {
                hr = dateInfo.getHours() - 12;
            } else {
                hr = dateInfo.getHours();
            }
            var currentTime = hr + ":" + _min + ":" + sec;

            $('.hms').html(currentTime);
            $('.ampm').html(ampm);
            //document.getElementsByClassName("hms")[0].innerHTML = currentTime;
            // document.getElementsByClassName("ampm")[0].innerHTML = ampm;

            var dow = [
                "الأحد",
                "الإثنين",
                "الثلاثاء",
                "الأربعاء",
                "الخميس",
                "الجمعة",
                "السبت"
            ],
            
            month = [
            "يناير",
            "فبراير",
            "مارس",
            "ابريل",
            "مايو",
            "يونيو",
            "يوليو",
            "اغسطس",
            "سبتمبر",
            "اكتوبر",
            "نوفمبر",
            "ديسمبر"
            ],
            day = dateInfo.getDate();

            var currentDate = dow[dateInfo.getDay()] + ", " + month[dateInfo.getMonth()] + " " + day;
            $('.date').html(currentDate);
            // document.getElementsByClassName("date")[0].innerHTML = currentDate;
            }, 1000)
        },

        agenda() {
            this.polling = setInterval(() => {
                $(document).ready(function () {
                    var windowHeight = window.innerHeight;
                    windowHeight -= 24;
                    document.body.style.height = windowHeight + "px";
                    //console.log(document.body.style.height);
                    $(".date-picker").datepicker({
                        inline: true,
                        showOtherMonths: true
                    });
                });
            }, 1000)
        } 
    },
    mounted() {
        this.updateTime();
        this.agenda();
    },
    
});
