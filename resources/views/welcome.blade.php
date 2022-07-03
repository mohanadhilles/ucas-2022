<!DOCTYPE html>
<html>
<head>
    
    <meta charset="UTF-8">
    <title>برنامج SMS</title>
    <!-- <link rel="shortcut icon" href="assetsReg/images/favicon.png"> -->


    <!-- grid table -->
    <link rel="stylesheet" href=" {{ asset('css/grid/style.css') }} " type="text/css" media="screen">
    <!-- <link rel="stylesheet" href="css/grid/responsive.css" type="text/css" media="screen"> -->

    <!-- normailze style and font awesome  -->
    <link href=" {{ asset('css/normalize.css') }} " rel="stylesheet"/>
    <link href=" {{ asset('css/grid/font-awesome-4.1.0/css/font-awesome.min.css') }} " rel="stylesheet"/>
    <link href=" {{ asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css') }} " rel="stylesheet"/>
    
    <!-- main style for header, main navigation, ads, footer  -->
    <link href=" {{ asset('css/main_style.css') }} " rel="stylesheet"/>
    
    <!-- style for body of site  -->
    <link href=" {{ asset('css/style.css') }} " rel="stylesheet"/>
    
    <!-- plugin style instald in system -->
    <link href=" {{ asset('css/datepicker.css') }} " rel="stylesheet"/>
    <link href=" {{ asset('css/app.css') }} " rel="stylesheet"/>
    <link href=" {{ asset('css/icon.css') }} " rel="stylesheet"/>


</head>
<body dir="rtl" style="height:auto;">
        <div id="app">
            
            <router-view></router-view>
            
            <my-footer v-if="this.$route.path != '/login'"></my-footer>
            
        </div>






<!-- jQuery if needed -->
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script type="text/javascript" src=" {{ asset('js/jquery-2.1.3.min.js') }} "></script>
<script type="text/javascript" src=" {{ asset('js/jquery-ui-1.10.1.min.js') }} "></script>
<script type="text/javascript" src=" {{ asset('js/tabbed.js') }} "></script>
<script type="text/javascript" src=" {{ asset('js/drop-down.js') }} "></script>
<script type="text/javascript" src=" {{ asset('js/PrayTimes.js') }} "></script>
<script src=" {{ asset('js/app.js') }} "></script>
<script>
    // pop up add Service
    function openFormService() {
        document.getElementById("myForm").style.display = "block";
    }

    function closeFormService() {
        document.getElementById("myForm").style.display = "none";
    }
    // edit
    function openFormEditService() {
        document.getElementById("myFormEdit").style.display = "block";
    }

    function closeFormEditService() {
        document.getElementById("myFormEdit").style.display = "none";
    }
// --------------------------------

    // pop up add Msrofat
    function openFormMsrofat() {
        document.getElementById("myForm").style.display = "block";
    }

    function closeFormMsrofat() {
        document.getElementById("myForm").style.display = "none";
    }
    // pop up edit Msrofat
    function openFormEditMsrofat() {
        document.getElementById("myFormEdit").style.display = "block";
    }

    function closeFormEditMsrofat() {
        document.getElementById("myFormEdit").style.display = "none";
    }
// --------------------------------

    // pop up add Income
    function openFormIncome() {
        document.getElementById("myForm").style.display = "block";
    }

    function closeFormIncome() {
        document.getElementById("myForm").style.display = "none";
    }
    // pop up edit Income
    function openFormEditIncome() {
        document.getElementById("myFormEdit").style.display = "block";
    }

    function closeFormEditIncome() {
        document.getElementById("myFormEdit").style.display = "none";
    }

    // pop up add Monthly expenses
    function openFormMonthlyexpenses() {
        document.getElementById("myForm").style.display = "block";
    }

    function closeFormMonthlyexpenses() {
        document.getElementById("myForm").style.display = "none";
    }

    // pop up edit Monthly expenses
    function openFormEditMonthlyexpenses() {
        document.getElementById("myFormEdit").style.display = "block";
    }

    function closeFormEditMonthlyexpenses() {
        document.getElementById("myFormEdit").style.display = "none";
    }

    
    // pop up add Monthly incomes
    function openFormMonthlyincomes() {
        document.getElementById("myForm").style.display = "block";
    }

    function closeFormMonthlyincomes() {
        document.getElementById("myForm").style.display = "none";
    }

    // pop up edit Monthly incomes
    function openFormEditMonthlyincomes() {
        document.getElementById("myFormEdit").style.display = "block";
    }

    function closeFormEditMonthlyincomes() {
        document.getElementById("myFormEdit").style.display = "none";
    }



    
</script>
</body>
</html>