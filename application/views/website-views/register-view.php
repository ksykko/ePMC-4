<style>
    .modal {
        overflow-y: auto;
    }

    .toast-error {
        background-color: #f75663d5;
        color: white;

    }

    .text-justify {
        text-align: justify;
    }


</style>
<div class="container-fluid" style="margin-top: 100px;">
    <div id="liveToastTrigger" class="toast-container top-0 p-3 toast-dialog">
        <?php if ($this->session->flashdata('error')) : ?>
            <div id="liveToast" class="toast toast-error" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header text-bg-danger bg-opacity-100">
                    <strong class="me-auto">Error!</strong>
                    <button type="button" class="btn-close btn-close-white shadow-none" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body bg-opacity-50">
                    <span><?= $this->session->flashdata('error') ?></span>
                </div>
            </div>
        <?php endif; ?>
    </div>


    <div class="row d-flex justify-content-center">
        <div class="col-sm-9 col-md-7">
            <div class="card shadow-lg border-0">
                <div class="card-body">
                    <div class="row mt-2">
                        <div class="col">
                            <h3 class="text-center fw-bolder">Register</h3>
                            <?= form_open('Register/register', array('id' => 'regForm')); ?>
                            <div id="terms-conditions" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header border-0">
                                            <h4 class="modal-title"></h4>
                                        </div>
                                        <div class="modal-body mx-3">
                                            <div class="row">
                                                <div class="col">
                                                    <h6 class="fs-5 text-center text-dark"><strong>Terms and Conditions</strong></h6>
                                                </div>
                                            </div>
                                            <div class="row text-justify">
                                                <div class="col" style="padding-top: 0px;padding-bottom: 0px;margin-top: -15px;margin-bottom: -15px;"><small class="text-dark"><br /><span style="color: rgb(0, 0, 0); background-color: transparent;">In order to protect your privacy, Pagtakhan Medical Center will keep all sensitive and confidential information you may give the clinic securely and privately.</span><br /><span style="color: rgb(0, 0, 0); background-color: transparent;">Please read carefully the PMC’s Data Privacy Policy to understand how your personal and health information are handled. Click </span><a href="#" data-bs-target="#data-privacy" data-bs-toggle="modal"><strong><span style="text-decoration: underline; color: rgb(50, 105, 191);">ePmc Data Privacy Policy</span></strong></a><span style="color: rgb(0, 0, 0); background-color: transparent;"> to read the Privacy Statement in full.</span><br /><br /><br /></small></div>
                                            </div>
                                            <div class="row text-justify" style="margin-top: -35px;">
                                                <div class="col"><small class="text-dark"><br /><strong><span style="color: rgb(0, 0, 0); background-color: transparent;">Acceptance of Agreement</span></strong><br /><span style="color: rgb(0, 0, 0); background-color: transparent;">You acknowledge that your use of the ePMC is subject to the terms and conditions indicated in this Terms of Use Agreement. Without giving you a specific notice, we reserve the right to change this Agreement from time to time. Your continuous use of ePMC will signify that you agree to any modifications, hence please examine the Agreement displayed on the website from time to time.</span><br /><br /><br /></small></div>
                                            </div>
                                            <div class="row text-justify" style="margin-top: -50px;">
                                                <div class="col"><small class="text-dark"><br /><strong><span style="color: rgb(0, 0, 0); background-color: transparent;">Member Registration Activation Obligations</span></strong><br /><span style="color: rgb(0, 0, 0); background-color: transparent;">You hereby agree to give truthful, accurate, current, and complete information about yourself as prompted by the Registration Process in consideration of your usage of ePMC. The assumption behind using the system is that the user is the legitimate recipient and viewer of all information made available and accessible by the system.</span><br /><br /><br /></small></div>
                                            </div>
                                            <div class="row text-justify" style="margin-top: -50px;">
                                                <div class="col"><small class="text-dark"><br /><strong><span style="color: rgb(0, 0, 0); background-color: transparent;">Personal Information and Privacy</span></strong><br /><span style="color: rgb(0, 0, 0); background-color: transparent;">The ePMC Data Privacy Policy applies to any personal and medical information you give to ePMC. By choosing to use the system, you are agreeing to the Policy&#39;s terms. You acknowledge that you are accountable for all actions that take place in your ePMC account and that you will notify us right away if your account is used without your permission. You can do this by sending us a message through this </span><a href="mailto:pagtakhanmedicalclinic@gmail.com">page</a><span style="color: rgb(0, 0, 0); background-color: transparent;">. As a result of any unauthorized access to and/or use of your account, or for any other reason, we disclaim all liability for any loss or damage you or any third party may sustain. </span><br /><br /><br /><br /><br /></small></div>
                                            </div>
                                            <div class="row text-justify" style="margin-top: -100px;margin-bottom: -50px;">
                                                <div class="col"><small class="text-dark"><br /><strong><span style="color: rgb(0, 0, 0); background-color: transparent;">Limitation of Liability</span></strong><br /><span style="color: rgb(0, 0, 0); background-color: transparent;">You agree that ePMC shall in no event be liable for any consequential, incidental, indirect, special, punitive, or other loss or damages whatsoever arising out of or caused by your use of inability to use the system, even if ePMC has been advised of the possibility of such damages.</span><br /><br /><br /><br /></small></div>
                                            </div>
                                            <div class="row">
                                                <div class="col d-flex justify-content-center">
                                                    <div class="form-check">
                                                        <input id="acceptCheck" class="form-check-input" type="checkbox" />
                                                        <label class="form-check-label small text-dark" for="formCheck-1">I Accept the Terms & Conditions</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer"><button id="continueBtn" class="btn btn-primary rounded-pill" type="button" data-bs-dismiss="modal">Continue</button></div>
                                    </div>
                                </div>
                            </div>
                            <div id="data-privacy" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header border-0">
                                            <h4 class="modal-title"></h4><button class="btn-close shadow-none" type="button" data-bs-toggle="modal" data-bs-target="#terms-conditions" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body mx-3">
                                            <div class="row">
                                                <div class="col">
                                                    <h6 class="fs-5 text-center text-dark"><strong><span style="color: rgb(0, 0, 0); background-color: transparent;">Data Privacy Policy</span></strong><br /></h6>
                                                </div>
                                            </div>
                                            <div class="row text-justify">
                                                <div class="col" style="padding-top: 0px;padding-bottom: 0px;margin-top: -15px;margin-bottom: -15px;"><small class="text-dark"><br /><span style="color: rgb(0, 0, 0); background-color: transparent;">The Data Protection Policy applies to the medical records of the patients held by Pagtakhan Medical Clinic (PMC), which is protected by the Data Privacy Act of 2012. This Privacy Notice has been written to explain what and how we collect, use, and store, who we may share your information with, and how we protect your data.</span><br /><br /><em><span style="color: rgb(0, 0, 0); background-color: transparent;">I. What personal data are collected from you? </span></em><br /><br /></small></div>
                                            </div>
                                            <div class="row text-justify" style="margin-left: 0px;margin-top: -17px;">
                                                <div class="col" style="padding-top: 0px;padding-bottom: 0px;margin-top: -15px;margin-bottom: -15px;"><small class="text-dark"><br /><span style="color: rgb(0, 0, 0); background-color: transparent;">The personal and health information that is collected from you or from an authorized representative are the following:</span><br /></small></div>
                                            </div>
                                            <div class="row text-justify" style="margin-left: 20px;margin-top: -7px;">
                                                <div class="col"><small><br /><span style="color: rgb(0, 0, 0); background-color: transparent;">a. General Information is divided into three sections namely:</span><br /></small></div>
                                            </div>
                                            <div class="row text-justify" style="margin-left: 52px;margin-top: -21px;">
                                                <div class="col"><small><br /><i class="far fa-circle me-1" style="font-size: 10px;"></i><span style="color: rgb(0, 0, 0); background-color: transparent;">Personal Information such as name, age, birthday, sex, occupation, and address;</span><br /></small></div>
                                            </div>
                                            <div class="row text-justify" style="margin-left: 52px;margin-top: -21px;">
                                                <div class="col"><small><br /><i class="far fa-circle me-1" style="font-size: 10px;"></i><span style="color: rgb(0, 0, 0); background-color: transparent;">Contact Information such as cellphone and telephone number, and email address;</span><br /></small></div>
                                            </div>
                                            <div class="row text-justify" style="margin-left: 52px;margin-top: -21px;">
                                                <div class="col"><small><br /><i class="far fa-circle me-1" style="font-size: 10px;"></i><span style="color: rgb(0, 0, 0); background-color: transparent;">Vital Signs such as your blood type, pulse rate, height, weight, systolic, and diastolic.</span><br /></small></div>
                                            </div>
                                            <div class="row text-justify" style="margin-left: 20px;margin-top: -20px;">
                                                <div class="col"><small><br /><span style="color: rgb(0, 0, 0); background-color: transparent;">b. Health or medical information such as diagnostic results, treatment plan, objectives, symptoms, laboratory results, prescription.</span><br /></small></div>
                                            </div>
                                            <div class="row text-justify">
                                                <div class="col" style="padding-top: 0px;padding-bottom: 0px;margin-top: -15px;margin-bottom: -15px;"><small class="text-dark"><br /><br /><em><span style="color: rgb(0, 0, 0); background-color: transparent;">II. Who are the authorized persons that can access and manages your data?</span></em><br /><br /></small></div>
                                            </div>
                                            <div class="row text-justify" style="margin-left: 0px;margin-top: -17px;">
                                                <div class="col" style="padding-top: 0px;padding-bottom: 0px;margin-top: -15px;margin-bottom: -15px;"><small class="text-dark"><br /><span style="color: rgb(0, 0, 0); background-color: transparent;">The employees of the PMC may access and manage your personal and health information based on the Data Privacy Act of 2012 wherein everything including the general information, diagnosis, treatment plan, and other information should be between the physician and patient only. The system administrators of this system are considered to be the general manager and secretaries can only retrieve the medical record of the patient but should not be allowed to view or make any alterations to the patients&#39; records except for their general information only.</span><br /></small></div>
                                            </div>
                                            <div class="row text-justify">
                                                <div class="col" style="padding-top: 0px;padding-bottom: 0px;margin-top: -15px;margin-bottom: -15px;"><small class="text-dark"><br /><br /><em><span style="color: rgb(0, 0, 0); background-color: transparent;">III. How and when do we collect your data?</span></em><br /><br /></small></div>
                                            </div>
                                            <div class="row text-justify" style="margin-left: 0px;margin-top: -17px;">
                                                <div class="col" style="padding-top: 0px;padding-bottom: 0px;margin-top: -15px;margin-bottom: -15px;"><small class="text-dark"><br /><span style="color: rgb(0, 0, 0); background-color: transparent;">If you are a new patient of PMC, you may register your general information through the website or mobile application. Upon consultation at the clinic, the system administrators may confirm your registration, and you will then have a patient record.</span><br /><span style="color: rgb(0, 0, 0); background-color: transparent;">If you are an old patient of PMC and already have a handwritten medical record, authorized personnel may manually add your medical record into the system or import it through the Optical Character Recognition tool.</span><br /><span style="color: rgb(0, 0, 0); background-color: transparent;">The electronic medical records are then stored in the system’s database and cannot be viewed and accessed by any unauthorized user.</span><br /><br /><br /></small></div>
                                            </div>
                                            <div class="row text-justify">
                                                <div class="col" style="padding-top: 0px;padding-bottom: 0px;margin-top: -15px;margin-bottom: -15px;"><small class="text-dark"><em><span style="color: rgb(0, 0, 0); background-color: transparent;">IV. How we may use your data</span></em><br /><br /><br /></small></div>
                                            </div>
                                            <div class="row text-justify" style="margin-left: 0px;margin-top: -17px;">
                                                <div class="col" style="padding-top: 0px;padding-bottom: 0px;margin-top: -15px;margin-bottom: -15px;"><small class="text-dark"><span style="color: rgb(0, 0, 0); background-color: transparent;">As your healthcare provider, we are allowed by law to use and disclose certain aspects of your personal health information without requesting your agreement or written consent. Your private health and medical data may be used and disclosed for, but not restricted to, the following purposes: </span><br /></small></div>
                                            </div>
                                            <div class="row text-justify" style="margin-left: 20px;margin-top: -7px;">
                                                <div class="col"><small><br /><span style="color: rgb(0, 0, 0); background-color: transparent;">a. Medical physicians, nurses, and other healthcare professionals involved in your care may be given access to personal health information.</span><br /><span style="color: rgb(0, 0, 0); background-color: transparent;">b.   We can share your personal health information with your legitimate authorized personal representative. A parent or legal guardian of a minor, for instance, is regarded as the personal representative.</span><br /><span style="color: rgb(0, 0, 0); background-color: transparent;">c.  To carry out public health advisories, activities, and investigations, we may disclose your personal health information to public health officials. We may also disclose your personal health information to our government agencies for health oversight activities and investigations, such as preventing or controlling infections and diseases.</span><br /><span style="color: rgb(0, 0, 0);">d.  When obliged to do so by law and/or government authorities, such as during legal proceedings or in response to a subpoena from a court of law, we may release your personal information.</span><br /><br /><br /></small></div>
                                            </div>
                                            <div class="row text-justify" style="margin-left: 0px;margin-top: -17px;">
                                                <div class="col" style="padding-top: 0px;padding-bottom: 0px;margin-top: -15px;margin-bottom: -15px;"><small class="text-dark"><span style="color: rgb(0, 0, 0); background-color: transparent;">Your personal information, including health and medical records, are not sold by us to marketing firms outside of our organization.</span><br /><span style="color: rgb(0, 0, 0); background-color: transparent;">We only use your personal information for purposes for which we have told you about or communicated with you. Additional data protection procedures will be applied, if needed by law, if we use it for other (closely linked) purposes.</span><br /><br /><br /></small></div>
                                            </div>
                                            <div class="row text-justify">
                                                <div class="col" style="padding-top: 0px;padding-bottom: 0px;margin-top: -15px;margin-bottom: -15px;"><small class="text-dark"><em><span style="color: rgb(0, 0, 0); background-color: transparent;">V. How is your personal data stored?</span></em><br /><br /><br /></small></div>
                                            </div>
                                            <div class="row text-justify" style="margin-left: 0px;margin-top: -17px;">
                                                <div class="col" style="padding-top: 0px;padding-bottom: 0px;margin-top: -15px;margin-bottom: -15px;"><small class="text-dark"><span style="color: rgb(0, 0, 0); background-color: transparent;">The policy applies to all the employees of PMC namely the physicians, general manager, secretaries, and nurses insofar as the measures under the policy relate to them. Data will be stored securely so that confidential information is protected in compliance with relevant legislation. This policy sets out the manner in which personal data and special categories of personal data will be protected by the clinic.</span><br /><br /><br /></small></div>
                                            </div>
                                            <div class="row text-justify">
                                                <div class="col" style="padding-top: 0px;padding-bottom: 0px;margin-top: -15px;margin-bottom: -15px;"><small class="text-dark"><em><span style="color: rgb(0, 0, 0); background-color: transparent;">VI. What are your rights?</span></em><br /><br /><br /></small></div>
                                            </div>
                                            <div class="row text-justify" style="margin-left: 0px;margin-top: -17px;">
                                                <div class="col" style="padding-top: 0px;padding-bottom: 0px;margin-top: -15px;margin-bottom: -15px;"><small class="text-dark"><span style="color: rgb(0, 0, 0); background-color: transparent;">We understand and value highly our duty to guard the personal information you provide to us against theft, unauthorized access, and misuse. The rights you have in relation to personal health information are listed below:</span><br /></small></div>
                                            </div>
                                            <div class="row text-justify" style="margin-left: 20px;margin-top: -7px;">
                                                <div class="col"><small><br /><span style="color: rgb(0, 0, 0); background-color: transparent;">a.    Access to your Personal Health Information</span><br /><span style="color: rgb(56, 66, 66);">b.    Limit and prevent disclosure</span><br /><span style="color: rgb(56, 66, 66);">c.    Amend personal health information</span><br /><span style="color: rgb(56, 66, 66);">d.    Authorize other uses</span><br /><span style="color: rgb(56, 66, 66);">e.    Receive notice of privacy breach</span><br /><br /><br /></small></div>
                                            </div>
                                        </div>
                                        <div class="modal-footer border-0"></div>
                                    </div>
                                </div>
                            </div>
                            <div class=" mx-md-4">
                                <div class="tab mt-3">
                                    <h5 class="fw-semibold mb-3">Personal Information</h5>
                                    <div class="row row-cols-1 row-cols-sm-2 mb-2">
                                        <div class="col form-group required col-md-5 px-1"><label class="form-label">First Name</label>
                                            <input class="form-control form-control-sm rounded-pill rounded-pill" type="text" id="first_name" name="first_name" /><small class="text-danger"><?= form_error('first_name') ?></small>
                                            <label id="firstName_error" class="text-danger font-monospace" style="font-size:13px"></label>
                                        </div>
                                        <div class="col form-group col-md-4 px-1"><label class="form-label">Middle Name</label>
                                            <input class="form-control form-control-sm rounded-pill" type="text" id="middle_name" name="middle_name" /><small class="text-danger"><?= form_error('middle_name') ?></small>
                                            <label id="middleName_error" class="text-danger font-monospace" style="font-size:13px"></label>
                                        </div>
                                        <div class="col form-group required col-md-3 px-1"><label class="form-label">Surname</label>
                                            <input class="form-control form-control-sm rounded-pill" type="text" id="last_name" name="last_name" /><small class="text-danger"><?= form_error('last_name') ?></small>
                                            <label id="lastName_error" class="text-danger font-monospace" style="font-size:13px"></label>
                                        </div>
                                    </div>
                                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 mb-2">
                                        <div class="col form-group required px-1"><label class="form-label">Age</label>
                                            <input class="form-control form-control-sm rounded-pill" type="text" id="age" name="age" value="<?= set_value('age') ?>" /><small class="text-danger"><?= form_error('age') ?></small>
                                            <label id="age_error" class="text-danger font-monospace" style="font-size:13px"></label>
                                        </div>
                                        <div class="col form-group required px-1"><label class="form-label">Birth date</label>
                                            <input class="form-control form-control-sm rounded-pill" id="birth_date" name="birth_date" type="date" value="<?= set_value('birth_date') ?>" /><small class="text-danger"><?= form_error('birth_date') ?></small>
                                            <label id="birthdate_error" class="text-danger font-monospace" style="font-size:13px"></label>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col form-group required col-md-3 px-1"><label class="form-label">Sex</label><select class="form-select form-select-sm rounded-pill text-dark" id="sex" name="sex">
                                                <?php if (set_value('sex') == 'Male') : ?>
                                                    <option value="" disabled>select ...</option>
                                                    <option value="Male" selected>Male</option>
                                                    <option value="Female">Female</option>
                                                <?php else : ?>
                                                    <option value="" selected disabled>select ...</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                <?php endif; ?>
                                            </select><small class="text-danger"><?= form_error('sex') ?></small></div>
                                        <div class="col form-group px-1"><label class="form-label">Civil Status</label><select class="form-select form-select-sm rounded-pill text-dark" id="civil_status" name="civil_status">
                                                <?php if (set_value('civil_status') == 'Single') : ?>
                                                    <option value="">select ...</option>
                                                    <option value="Single" selected>Single</option>
                                                    <option value="Married">Married</option>
                                                    <option value="Divorced">Divorced</option>
                                                    <option value="Separated">Separated</option>
                                                    <option value="Widowed">Widowed</option>
                                                <?php elseif (set_value('civil_status') == 'Married') : ?>
                                                    <option value="">select ...</option>
                                                    <option value="Single">Single</option>
                                                    <option value="Married" selected>Married</option>
                                                    <option value="Divorced">Divorced</option>
                                                    <option value="Separated">Separated</option>
                                                    <option value="Widowed">Widowed</option>
                                                <?php elseif (set_value('civil_status') == 'Divorced') : ?>
                                                    <option value="">select ...</option>
                                                    <option value="Single">Single</option>
                                                    <option value="Married">Married</option>
                                                    <option value="Divorced" selected>Divorced</option>
                                                    <option value="Separated">Separated</option>
                                                    <option value="Widowed">Widowed</option>
                                                <?php elseif (set_value('civil_status') == 'Separated') : ?>
                                                    <option value="">select ...</option>
                                                    <option value="Single">Single</option>
                                                    <option value="Married">Married</option>
                                                    <option value="Divorced">Divorced</option>
                                                    <option value="Separated" selected>Separated</option>
                                                    <option value="Widowed">Widowed</option>
                                                <?php elseif (set_value('civil_status') == 'Widowed') : ?>
                                                    <option value="">select ...</option>
                                                    <option value="Single">Single</option>
                                                    <option value="Married">Married</option>
                                                    <option value="Divorced">Divorced</option>
                                                    <option value="Separated">Separated</option>
                                                    <option value="Widowed" selected>Widowed</option>
                                                <?php else : ?>
                                                    <option value="" selected disabled>select ...</option>
                                                    <option value="Single">Single</option>
                                                    <option value="Married">Married</option>
                                                    <option value="Divorced">Divorced</option>
                                                    <option value="Separated">Separated</option>
                                                    <option value="Widowed">Widowed</option>
                                                <?php endif; ?>
                                            </select><small class="text-danger"><?= form_error('civil_status') ?></small></div>
                                        <div class="col form-group px-1"><label class="form-label">Occupation</label><input class="form-control form-control-sm rounded-pill" type="text" id="occupation" name="occupation" value="<?= set_value('occupation') ?>" /></div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col form-group px-1"><label class="form-label">Address</label>
                                            <input class="form-control form-control-sm rounded-pill" type="text" id="address" name="address" value="<?= set_value('address') ?>" />
                                        </div>
                                    </div>
                                </div>
                                <div class="tab mt-3">
                                    <h5 class="heading-modal fw-semibold">Contact Information</h5>
                                    <hr size="5" />
                                    <div class="row row-cols-1 row-cols-sm-2">
                                        <div class="col form-group required px-1"><label class="form-label">Cellphone No.</label><input class="form-control form-control-sm rounded-pill" type="tel" id="cell_no" name="cell_no" placeholder="09xxxxxxxxx" value="<?= set_value('cell_no') ?>" />
                                            <label id="cell_no_error" class="text-danger font-monospace" style="font-size:13px"></label>
                                        </div>
                                        <div class="col form-group px-1"><label class="form-label">Telephone No.</label><input class="form-control form-control-sm rounded-pill" type="tel" id="tel_no" name="tel_no" value="<?= set_value('tel_no') ?>" />
                                            <label id="tel_no_error" class="text-danger font-monospace" style="font-size:13px"></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col form-group required px-1"><label class="form-label">Email</label><input class="form-control form-control-sm rounded-pill" type="email" id="email" name="email" placeholder="name@example.com" value="<?= set_value('email') ?>" />
                                            <label id="email_error" class="text-danger font-monospace" style="font-size:13px"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab mt-3">
                                    <h5 class="heading-modal fw-semibold">Emergency Contact</h5>
                                    <hr size="5" />
                                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-2 row-cols-xl-2 row-cols-xxl-2 mb-2">
                                        <div class="col form-group required px-1"><label class="form-label">Name</label><input class="form-control form-control-sm rounded-pill" type="text" id="ec_name" name="ec_name" value="<?= set_value('ec_name') ?>" />
                                            <label id="ec_name_error" class="text-danger font-monospace" style="font-size:13px"></label>

                                        </div>
                                        <div class="col form-group required px-1"><label class="form-label">Relationship</label><select class="form-select form-select-sm rounded-pill text-dark" id="relationship" name="relationship">
                                                <option value="" selected disabled>select ...</option>
                                                <option value="Father">Father</option>
                                                <option value="Mother">Mother</option>
                                                <option value="Sibling">Sibling</option>
                                                <option value="Child">Child</option>
                                                <option value="Spouse">Spouse</option>
                                                <option value="Grandparent">Grandparent</option>
                                                <option value="Guardian">Guardian</option>
                                                <option value="Other">Other</option>
                                            </select>
                                            <label id="relationship_error" class="text-danger font-monospace" style="font-size:13px"></label>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col form-group required px-1 col-md-6"><label class="form-label">Contact No.</label>
                                            <input class="form-control form-control-sm rounded-pill" type="tel" id="ec_contact_no" name="ec_contact_no" value="<?= set_value('ec_contact_no') ?>" />
                                            <label id="ec_contact_error" class="text-danger font-monospace" style="font-size:13px"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab mt-3">
                                    <h5 class="heading-modal fw-semibold">Password</h5>
                                    <hr size="5" />
                                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-2 row-cols-xl-2 row-cols-xxl-2 mb-2">
                                        <div class="col form-group px-1"><label class="form-label">Password</label><input class="form-control form-control-sm rounded-pill" type="password" id="password" name="password" value="<?= set_value('ec_name') ?>" />
                                            <label id="password_error" class="text-danger font-monospace" style="font-size:13px"></label>
                                        </div>
                                        <div class="col form-group px-1"><label class="form-label">Confirm Password</label><input class="form-control form-control-sm rounded-pill" type="password" id="conf_password" name="conf_password" />
                                            <label id="confirm_password_error" class="text-danger font-monospace" style="font-size:13px"></label>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer m-4" style="overflow:auto;">
                                    <div style="float:right;">
                                        <button class="btn btn-light rounded-pill btn-sm" type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                                        <button class="btn btn-primary rounded-pill btn-sm" type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                                    </div>
                                </div>
                                <!-- Circles which indicates the steps of the form: -->
                                <div class="mb-2" style="text-align:center;">
                                    <span class="step"></span>
                                    <span class="step"></span>
                                    <span class="step"></span>
                                    <span class="step"></span>
                                </div>
                            </div>
                            <?= form_close() ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>