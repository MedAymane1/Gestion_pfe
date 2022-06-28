<div class="box1">
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="text-primary">Create Group</h1>
        <i class="fa-solid fa-arrow-left-long back_icon1" onclick="goBack()"></i>
    </div>
    <hr><br>

    <div id="alert-area">
        <!-- show alerts -->
    </div>
    <form method="post" onsubmit="event.preventDefault()">
        <div class="row mb-3">
            <label for="group-name" class="col-lg-3 form-label">Group name</label>
            <div class="col-lg-9">
                <input type="text" class="form-control" id="group-name" name="groupName">
            </div>
        </div>
        <div class="row mb-3">
            <label for="group-user" class="col-lg-3 form-label">Group userName</label>
            <div class="col-lg-9">
                <input type="text" class="form-control" id="group-user" name="groupUser">
            </div>
        </div>
        <div class="row mb-3">
            <label for="passwd" class="col-lg-3 form-label">Password</label>
            <div class="col-lg-9">
                <input type="password" class="form-control" id="passwd" name="passwd">
            </div>
        </div>
        <div class="col-12 mb-3">
            <div><span class="fs-5">Selected members:</span></div>
            
            <div id="member-add" class="ps-3">
                <span class="text-muted">No member selected</span>
                <!-- for the selected members -->
            </div>
        </div>
        <div class="col-12 mb-3 d-flex justify-content-end">
            <button type="submit"
                    class="btn btn-primary group_btn1"
                    name="btn"
                    onclick="CreateGrp(this.name)">
                Create Group
            </button>
        </div>

        <div>
            <h4 class="py-3">Choose group members:</h4>
            <input type="text"
                id="search-etd"
                class="search_etd1"
                onkeyup="searchStudent()"
                placeholder="Search for apogées....">
                
            <div class="list_wrapper1">
                <table id="list-etd" class="list_etd1">
                    <!-- for the students list -->
                </table>
            </div>
        </div>
    </form>
</div>
