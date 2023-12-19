<?php
session_start();


include('includes/header.php');
include('includes/navbar.php');

?>

 <!---------------sidebar start--------------------->
 <div class="left-side">
                    <div class="close">
                        <div class="bar"></div>
                    </div>
                    <div style="border-bottom:1px solid rgba(113 119 144 / 25%);" class="mb-2">
                        <h4 class="fs-20 fw-600 pb-0 mb-0">Filter:</h4>
                    </div>
                      <!--  <div class="side-wrapper mb-3 mt-4">
                           <div class="side-menu" id="filter_search">
                                <input type="text" placeholder="Search here...">
                                <span class="line"></span>
                           </div>
                        </div> -->
                        <div class="side-wrapper mb-2">
                            <div class="side-title mb-1">Categories</div>
                            <div class="side-menu">
                                <div class="d-flex mt-1 form-check">
                                    <input type="radio" id="cyber_security" value="Cyber Security" name="category" class="form-check-input category_item common_selector">
                                    <label class="form-check-label" for="cyber_security">Cyber Security</label>
                                </div>
                                <div class="d-flex mt-1 form-check">
                                    <input type="radio" id="graphics_design" value="Graphics Design" name="category" class="form-check-input category_item common_selector">
                                    <label class="form-check-label" for="graphics_design">Graphics Design</label>
                                </div>
                                <div class="d-flex mt-1 form-check">
                                    <input type="radio" id="it-support" value="IT Support" name="category" class="form-check-input category_item common_selector">
                                    <label class="form-check-label" for="it-support">IT Support</label>
                                </div>
                                <div class="d-flex mt-1 form-check">
                                    <input type="radio" id="video-editor" value="Video Editing" name="category" class="form-check-input category_item common_selector">
                                    <label class="form-check-label" for="video-editor">Video Editor</label>
                                </div>
                                <div class="d-flex mt-1 form-check">
                                    <input type="radio" id="software_development" value="Software Development" name="category" class="form-check-input category_item common_selector">
                                    <label class="form-check-label" for="software_development">Software Development</label>
                                </div>
                                <div class="d-flex mt-1 form-check">
                                    <input type="radio" id="ux/ui_designer" value="UI/UX Design" name="category" class="form-check-input category_item common_selector">
                                    <label class="form-check-label" for="ux/ui_designer">ux/ui design</label>
                                </div>
                                <div class="d-flex mt-1 form-check">
                                    <input type="radio" id="web_design" value="Web Design" name="category" class="form-check-input category_item common_selector">
                                    <label class="form-check-label" for="web_design">Web Design</label>
                                </div>
                                <div class="d-flex mt-1 form-check">
                                    <input type="radio" id="web_development" value="Web Development" name="category" class="form-check-input category_item common_selector">
                                    <label class="form-check-label" for="web_development">Web Development</label>
                                </div>
                            </div>
                        </div>
                        <div class="side-wrapper mb-2">
                            <div class="side-title mb-1">Skills</div>
                            <div class="side-menu">
                                <div class="d-flex mt-1 form-check">
                                    <input type="radio" id="fresher" value="0" name="skill" class="form-check-input skill_item common_selector">
                                    <label class="form-check-label" for="fresher">fresher</label>
                                </div>
                                <div class="d-flex mt-1 form-check">
                                    <input type="radio" id="1_years" value="1" name="skill" class="form-check-input skill_item common_selector">
                                    <label class="form-check-label" for="1_years">1 years & above</label>
                                </div>
                                <div class="d-flex mt-1 form-check">
                                    <input type="radio" id="2_years" value="2" name="skill" class="form-check-input skill_item common_selector">
                                    <label class="form-check-label" for="2_years">2 years & above</label>
                                </div>
                                <div class="d-flex mt-1 form-check">
                                    <input type="radio" id="3_years" value="3" name="skill" class="form-check-input skill_item common_selector">
                                    <label class="form-check-label" for="3_years">3 years & above</label>
                                </div>
                                <div class="d-flex mt-1 form-check">
                                    <input type="radio" id="5_years" value="5" name="skill" class="form-check-input skill_item common_selector">
                                    <label class="form-check-label" for="5_years">5 years & above</label>
                                </div>
                                <div class="d-flex mt-1 form-check">
                                    <input type="radio" id="10_years" value="10" name="skill" class="form-check-input skill_item common_selector">
                                    <label class="form-check-label" for="1_years">10 years & above</label>
                                </div>
                            </div>
                        </div>
                </div>
            <!---------------sidebar end--------------------->
            <!---------------candidate section start--------------------->
          
                <div class="candidate-section">
                    <div class="filter">
                        <div class="filterBtn">
                            <div class="d-flex">
                              <div class="icon">
                                <div class="bar"></div>
                              </div>
                              <p class='text-dark' >filter</p>
                            </div>
                        </div>
                    </div>
                    <div class="filter_data">


                <!---------------get data from ajax/jobseekrer.php--------------------->




                </div>
                   
                </div> 

                <!---------------candidate section end--------------------->






<script>
$(document).ready(function(){
        load_data(1);
        function load_data(page){
            filter_data();
            function filter_data(){
                var action = 'fetch_data';
                var category = get_filter('category_item');
                var skill = get_filter('skill_item');
        $.ajax({
            url:"<?= base_url('ajax/jobseeker') ?>",
            method:"POST",
            datatype: 'JSON',
            data:{action:action,page:page,category:category,skill:skill},
            success:function(data){
               // alert(data);
                $('.filter_data').html(data);
            }
            });
        }

        function get_filter(class_name){
            var filter = [];
            $('.'+class_name+':checked').each(function(){
                filter.push($(this).val());
            });
            return filter;
        }
    
       $('.common_selector').click(function(){
        load_data(1);
            
        });
        };


        $(document).on('click', '.pagination a', function(){
        var page = $(this).data('page_number');
        load_data(page);
        });
       
        });


</script>

<?php
include('includes/footer.php');
?>