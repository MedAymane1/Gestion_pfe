<div class="container">
    <form class="row g-3" onsubmit="event.preventDefault()">
        <h1 class="text-primary text-center">Change My Password</h1>
        <hr>
        <div class="alert_area_pass2 d_none2">
            <!--  -->
        </div>
        <div class="col-12">
            <label for="old-pass" class="label_field">Old Password</label>
            <input type="password" class="form-control" id="old-pass" name="oldP">
        </div>
    
        <div class="col-12">
            <label for="new-pass" class="label_field">New Password</label>
            <input type="password" class="form-control" id="new-pass" name="newP">
        </div>
    
        <div class="col-12">
            <label for="c-new-pass" class="label_field">Confirm New Password</label>
            <input type="password" class="form-control" id="c-new-pass" name="cNewP">
        </div>
        
        <div class="col-12 d-flex justify-content-end">
            <button type="button"
                    class="btn btn-secondary mt-2 btn2"
                    onclick="cancelChange()">Cancel</button>
            <button type="submit"
                    class="btn btn-primary ms-4 mt-2 btn2"
                    value="changePass" 
                    onclick="changePasswd(this.value)">Change</button>
        </div>
    </form>
</div>
