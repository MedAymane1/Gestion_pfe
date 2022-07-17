<div class="container">
    <h1 class="text-primary">Add new member</h1>
    <hr>
    <div id="alert-area">
        <!-- show alerts -->
    </div>
    <form onsubmit="event.preventDefault()">
        <div class="col-12 d-flex justify-content-end pe-md-5">
            <button type="button"
                    class="btn btn-secondary mt-2 btn2"
                    onclick="cancelAdd()">Cancel</button>
            <button type="submit"
                    class="btn btn-primary ms-4 mt-2 btn2"
                    value="addMember" 
                    onclick="addMember(this.value)">Add member</button>
        </div>
        <div>
            <h4 class="py-3">Choose member to add:</h4>
            <input type="text"
                id="search-new-mmber"
                class="search_etd1"
                onkeyup="searchNewMember()"
                placeholder="Search for apogées....">
                
            <div class="list_wrapper1">
                <table id="list-stu" class="list_etd1">
                    <!-- for the students list -->
                </table>
            </div>
        </div>
    </form>
</div>
