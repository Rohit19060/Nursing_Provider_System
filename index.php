<?php
include_once("./includes/function.php");
require_once("./includes/db.php");
include_once("./includes/header.php");
echo message();
echo username();
?>
<div class="main_div">
    <h1 class="text-center title">Welcome</h1>
    <h3 class="text-center sub">
        Online Nursing portal is a website that user can search for home personal nursing. User have to register before
        hire nurse, user also can check the nurse personal profile detail. We are provide type of home service example:
        private nurse, mobility emergency transportation, wound management and healthy knowledge. All of the nurse
        engage in this field are carry professional and experience much like hospitals do.
    </h3>

    <div class="sub_buttons">
        <a href="getHired.php" class="getStarted text-center">
            Earn Money Freelancing
        </a>
        <a href="hire.php" class="getStarted text-center">
            Hire a Freelancer
        </a>
    </div>
</div>
<div class="main_div">
    <h1 class="text-center title">Why Choose Us</h1>
    <ul class="sub">
        <li>
            We provide close interaction with our client’s and their families by keeping families updated with what’s
            going on with their loved one through phone calls and emails which many times help to bridge the gap when
            distance is a barrier.
        </li>
        <li>
            We perform monthly supervisory visits to monitor and assess whether our Caregivers are compliant with
            following the prescribed home care plan and to ensure that our clients are pleased with the care being
            provided.
        </li>
        <li>
            24-hour access to services, 7 days a week, including all holidays and weekends
        </li>
        <li>
            Highly trained, screened, and credentialed healthcare professionals
        </li>
    </ul>
</div>

<div class="packages">

    <div>
        <h1 class="text-center title">Package</h1>
        <h3>
            Private Service- 24 hours stay-in certified caregiver
        </h3>
    </div>
    <div class="small_package mt-3">
        <ul>
            <h3>
                Per week-RM1500, per month RM5000
            </h3>
            <li>Daily living activities</li>
            <li>Diary and Vitals Recording</li>
            <li>Manage & Tract Medication Intake</li>
            <li>Grooming & Personal Hygiene</li>
            <li>Simple Exercise & Basic Physiotherapy</li>
            <li>Mind Stimulation exercises</li>
            <li>Communication and companionship</li>
            <li>Escorting to hospital/clinic for doctor's appointment</li>
        </ul>


        <ul>
            <h3>Additional Medical Services</h3>
            <li>Feeding tube insertion</li>
            <li>Urinary catheter</li>
            <li>Wound dressing</li>
            <li>Bed sores management</li>
            <li>Stoma care</li>
            <li>Complimentary Physiotherapy services for all long-term residents</li>
            <li>Ambulance services</li>
        </ul>
        <ul>
            <h3>With each package, Customer will be entitled to:</h3>
            <li>24 hour care service headed by Nursing Manager</li>
            <li>Wound care by qualified nurses</li>
            <li>Medication Management</li>
            <li>Ryle’s tube care / Catheter care</li>
            <li>Five home-cooked meals</li>
        </ul>
    </div>
</div>

<div class="packages">
    <h1 class="text-center title">Feedback</h1>
    <h2>Tell us what you think... it helps us get even better!</h2>
    <ul>
        <li>Name, Email, Phone Number and Gender.</li>
        <li>How satisfied are you in general with the HELP CARE services? </li>
        <li>How would you assess the overall quality of our service?*</li>
        <li>
            • If you had a friend or neighbor needing care would you recommend our agency to them?*
        </li>
        <li>
            Have you any additional comments and suggestions on how we might improve our service to you? Please write them in this box.
        </li>
    </ul>
    <form action="feedback.php" method="post">
        <textarea name="feedback" id="feedback" rows="10" cols="100" class="mt-3 mb-2"></textarea>
        <div>
            <input type="submit" value="Submit" class="mt-3 mb-2">
        </div>
    </form>
</div>
<?php include_once("./includes/footer.php");
