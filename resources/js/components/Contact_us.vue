<template>
    <div>
  <MyHeader />
        
        
<div class="main_content">
    <div class="report expense-report agenda">
        <div class="div-title">
            <i class="fa fa-phone"></i>
            <span>اتصل بنا</span>
        </div>
        <form id="contact-form" class="form-horizontal" role="form">
            <div class="form-group">
                <div class="col-sm-12">
                    <input type="text"  class="form-control" id="name" placeholder="الإسم" name="name" value="" required>
                </div>
            </div>
            <br>
            <textarea class="form-control" rows="10" placeholder="الملاحظات" name="message" required></textarea>
            <br>
            <br>
            <button class="btn btn-primary send-button" id="submit" type="submit" value="SEND">
                <span class="send-text">إرسال</span>

            </button>

        </form>

        <div>
            <img src="img/contact_us.png" style="float:left; margin-top:30%; margin-left: 4%;" width="180px" alt="">
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
    name: 'Contact_us',
     components: { MyHeader },
}
</script>