<?php include 'config/db_connection.php';?>
<!--INSERT VALUES-->
<?php
    if(isset($_POST['data_entry_save1'])){
        date_default_timezone_set("Asia/Dhaka");
        $data_entry_date1 = date('Y-m-d H:i:s');
        $sql = "";
        $data_entry_name1 = $_POST['data_entry_name1'];
        $data_entry_email1 = $_POST['data_entry_email1'];
        $data_entry_age1 = $_POST['data_entry_age1'];
        $data_entry_profession1 = $_POST['data_entry_profession1'];
        $data_entry_mobile1 = $_POST['data_entry_mobile1'];
        $sql = "insert INTO personal_documents (NAME, EMAIL, PHONE, PROFESSION, AGE, ID_NUMBER, CREATED_ON)
            VALUES ('".$data_entry_name1."', '".$data_entry_email1."', '".$data_entry_mobile1."', '".$data_entry_profession1."', '".$data_entry_age1."', '1234', '".$data_entry_date1."')";
        
    }
    if(isset($_POST['data_entry_save2'])){
        date_default_timezone_set("Asia/Dhaka");
        $data_entry_date2 = date('Y-m-d H:i:s');
        $sql = "";
        $data_entry_name2 = $_POST['data_entry_name2'];
        $data_entry_email2 = $_POST['data_entry_email2'];
        $data_entry_mobile2 = $_POST['data_entry_mobile2'];
        $company_contact_person2 = $_POST['company_contact_person2'];
        $company_type2 = $_POST['company_type2'];
        $company_address2 = $_POST['company_address2'];
        $company_web_link2 = $_POST['company_web_link2'];
        $company_fb_link2 = $_POST['company_fb_link2'];
        $sql = "insert INTO company_documents (COMPANY_NAME, COMPANY_EMAIL, COMPANY_PHONE, COMPANY_TYPE, CONTACT_PERSON, COMPANY_ADDRESS, COMPANY_WEB_LINK, COMPANY_FB_LINK, CREATED_ON)
            VALUES ('".$data_entry_name2."', '".$data_entry_email2."', '".$data_entry_mobile2."','".$company_type2."', '".$company_contact_person2."', '".$company_address2."', '".$company_web_link2."', '".$company_fb_link2."', '".$data_entry_date2."')";
        
    }
?>

<div class = "data_entry_div_cls1" id ="data_entry_div_id1">
    <form >
        <div class='form-group' id="choose">
                <input type="radio" name="form_type1" checked id="personal_document" value="personal_document">
                <label for='personal_document' class=''>personal_document</label>
             
               <input type="radio" name="form_type1" id="company_document" value="company_document">
               <label for='company_document' class=''>company_document</label>
        </div>
    </form>         
</div>
<!--Personal Data Entry Form-->

<div class="tab-content" id ="data_entry_div_id2">
    <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
        <div class="main-card mb-3 card">
            <div class="card-body"><h5 class="card-title">Enter Your Personal Information</h5>
                <form class="" action = "" method = "post">
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="data_entry_name1" class="">Name</label>
                                <input name="data_entry_name1" id="data_entry_name1" placeholder="Enter your name" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="data_entry_email1" class="">Email</label>
                                <input name="data_entry_email1" id="data_entry_email1" placeholder="Enter your email" type="email" class="form-control">
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="data_entry_age1" class="">Age</label>
                                <input name="data_entry_age1" id="data_entry_age1" placeholder="Enter your age" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="data_entry_profession1" class="">Profession</label>
                                <input name="data_entry_profession1" id="data_entry_profession1" placeholder="Enter your profession" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="data_entry_mobile1" class="">Mobile No</label>
                                <input name="data_entry_mobile1" id="data_entry_mobile1" placeholder="Enter your mobile no" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="data_entry_mobile1" class="">NID/PASSPORT</label>
                                <input name="data_entry_mobile1" id="data_entry_mobile1" placeholder="Enter your credentials" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="data_entry_id1" class="">ID Type</label>
                                <select class="form-control" style="width:100%;" id="customer_search">
            			            <option value="-1">-Select-</option>
            				        <option value="">NID</option>
            				        <option value="">Passport</option>
            				    </select>
                            </div>
                        </div>
                    </div>
                    <input name = "data_entry_save1" type="submit" class="btn-wide btn-pill btn-shadow btn-hover-shine btn btn-primary btn-lg pull-right" id="data_entry_save1" value="Save">
                </form>
            </div>
        </div>
    </div>
</div>


<!--Hidden Company Onformation-->


<div class="tab-content" id ="data_entry_div_id3" style = "display:none">
    <!---->
    <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
        <div class="main-card mb-3 card">
            <div class="card-body"><h5 class="card-title">Enter Your Company Information</h5>
                <form class="" action = "" method = "post">
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="data_entry_name2" class="">Company Name</label>
                                <input name="data_entry_name2" id="data_entry_name2" placeholder="Enter your company name" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="data_entry_email2" class="">Company's Email</label>
                                <input name="data_entry_email2" id="data_entry_email2" placeholder="Enter your company's email" type="email" class="form-control">
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="data_entry_mobile2" class="">Company Phone No</label>
                                <input name="data_entry_mobile2" id="data_entry_mobile2" placeholder="Enter Company's Offical Contact No" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="company_contact_person2" class="">Person To Contact</label>
                                <input name="company_contact_person2" id="company_contact_person2" placeholder="Enter a person's contact no" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="company_type2" class="">Type Of Company</label>
                                <input name="company_type2" id="company_type2" placeholder="Enter the type of your company" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="company_address2" class="">Address</label>
                                <input name="company_address2" id="company_address2" placeholder="Enter your company's address" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="company_web_link2" class="">Web Link</label>
                                <input name="company_web_link2" id="company_web_link2" placeholder="Enter your company's web address" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="company_fb_link2" class="">Facebook Link</label>
                                <input name="company_fb_link2" id="company_fb_link2" placeholder="Enter your company's FB page link" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <input name = "data_entry_save2" type="submit" class="btn-wide btn-pill btn-shadow btn-hover-shine btn btn-primary btn-lg pull-right" id="data_entry_save1" value="Save">
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $("input").on("click",function(){
        var type = $("input:checked").val();
        
        if(type=="personal_document"){
            $("#data_entry_div_id2").show();
            $("#data_entry_div_id3").hide();
        }
        else{
            $("#data_entry_div_id3").show();
            $("#data_entry_div_id2").hide();
            
        }
        });
    });
</script>
