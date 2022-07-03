<template>
    <div>
  <MyHeader />
        
<div class="main_content">
    <div class="report expense-report agenda">
        <div class="div-title">
            <i class="fa fa-info-circle"></i>
            <span>سياسة الخصوصية</span>

        </div>
        <br>
      
        <div>
            <h2 style="text-align: center;">&nbsp;صفحة سياسة الخصوصية</h2>
            <br>
            <div id="syasa">
            <p>
              في موقع <router-link to="" >(cost.ps)</router-link> ، ندرك
              أن خصوصية معلوماتك الشخصية هامة لك ولنا.
            </p>
            <p>
              فيما يلي معلومات حول أنواع المعلومات الشخصية التي نتلقاها ونقوم بجمعها عند
              زيارات&nbsp;<router-link to="" >(cost.ps)</router-link>، وكيف
              نقوم بحماية معلوماتك الشخصية.
            </p>
            <h3 style="text-align: right;">ملفات السجل</h3>
            <p>
              كما هو الحال مع معظم مواقع الويب المختلفة، نقوم بجمع واستخدام البيانات
              الموجودة في ملفات السجل.
            </p>
            <p>
              تشمل المعلومات الموجودة في ملفات السجل عنوان بروتوكول الإنترنت (IP) الخاص بك،
              ومزود خدمة الإنترنت (ISP)، والمتصفح الذي استخدمته لزيارة موقعنا، والوقت الذي
              قمت فيه بالزيارة، والصفحات التي قمت بزيارتها عبر موقعنا.
            </p>

            <h3 style="text-align: right;">ملفات تعريف الارتباط الأساسية</h3>
            <p>
              تعد ملفات تعريف الارتباط الأساسية ضرورية لك للتنقل والتنقل في جميع أنحاء
              الموقع، ولا تخزن أي معلومات يمكن استخدامها لأغراض الدعاية، بدون ملفات تعريف
              الارتباط الأساسية، لن يعمل موقعنا بشكل صحيح.
            </p>
            <h3 style="text-align: right;">ملفات تعريف الارتباط المخصصة</h3>
            <p>
              تخزن ملفات تعريف الارتباط هذه المعلومات ، مثل تفضيلاتك الشخصية ، وتستخدمها
              لتخصيص تجربة فريدة لك.
            </p>
            <p>
              قد يشمل ذلك عرض نافذة منبثقة مرة واحدة فقط في زيارتك ، أو حفظ تفضيلات اللغة
              الخاصة بك ، أو السماح لك بتسجيل الدخول تلقائيًا إلى بعض ميزاتنا.
            </p>
            <h3 style="text-align: right;">ملفات تعريف الارتباط في Analytics</h3>
            <p>
              تلتقط ملفات تعريف الارتباط من Analytics بيانات مجهولة المصدر حتى نتمكن من رؤية
              الاتجاهات وتحسين تجربة موقعنا على الويب.
            </p>
            <p>
              هذه تتيح لنا اختبار تصميمات مختلفة ، وتساعدنا على تحديد الكسر إذا كان جزء من
              موقعنا لا يعمل.
            </p>
        </div>
         
            <div><br /></div>
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
import MyHeader from "./MyHeader";

export default {
    name:"Instructions" ,
     components: { MyHeader },

}
</script>