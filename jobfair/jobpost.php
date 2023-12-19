<?php
session_start();
$page_title = "Jobpost";


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
                    
                </div>
            <!---------------sidebar end--------------------->
            <!---------------candidate section start--------------------->

                <div class="jobs-section">
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


<!---------------get data from ajax/jobpost.php--------------------->




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
        $.ajax({
            url:"<?= base_url('ajax/jobpost') ?>",
            method:"POST",
            datatype: 'JSON',
            data:{action:action,page:page,category:category},
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