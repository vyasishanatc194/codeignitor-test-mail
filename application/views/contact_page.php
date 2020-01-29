<div class="container">
    <h2 class="text-center">Contact Form</h2>
	<div class="row justify-content-center">
		<div class="col-12 col-md-8 col-lg-8 pb-5">


                    <!--Form with header-->
                    <div class="card">
                    <?php if($this->session->flashdata('error') != ''){
                        echo '<div class="info" style="margin-left:10px;"><span class="errors" >' . $this->session->flashdata('error') . '</span></div>';
                    }
                    // display all messages
                    echo validation_errors();
                    ?>
                    </div>
                    <form action="<?php echo base_url();?>contact/send" method="post">
                        <div class="card border-primary rounded-0">
                            <div class="card-header p-0">
                                <div class="bg-info text-white text-center py-2">
                                    <h3><i class="fa fa-envelope"></i> Contact</h3>
                                </div>
                            </div>
                            <div class="card-body p-3">

                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-user text-info"></i></div>
                                        </div>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Recipient Email Address" value="<?php echo set_value('email'); ?>" required>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-envelope text-info"></i></div>
                                        </div>
                                        <input type="text" value="<?php echo set_value('subject'); ?>" class="form-control" id="subject" name="subject" placeholder="Enter your Subject" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <!-- <div class="input-group-text"><i class="fa fa-comment text-info"></i></div> -->
                                        </div>
                                        <textarea class="form-control editor"  name="body" placeholder="Email Message Body" required><?php echo set_value('body'); ?></textarea>
                                    </div>
                                </div>

                                <div class="text-center">
                                    <input type="submit" value="Send" class="btn btn-info btn-block rounded-0 py-2">
                                </div>
                            </div>

                        </div>
                    </form>
                    <!--Form with header-->


                </div>
	</div>
</div>
