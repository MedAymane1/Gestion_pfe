
function newGroup() {
    let xhr = new XMLHttpRequest();
    let groups = document.getElementById("all-groups");
    let newGroup = document.getElementById("new-group");

    xhr.onreadystatechange = function() {
        if(this.readyState === 4 && this.status === 200) {
            groups.style.display = "none";
            newGroup.style.display = "block";
            newGroup.innerHTML = this.response;
        }
    }
    xhr.open("GET", "../Groups/php/new_group.php", true);
    xhr.send();
}

// Filter the list of students by the apogee entered in the search box 
function searchStudent() {
    // Declare variables
    let input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("my-input");
    filter = input.value;
    table = document.getElementById("my-table");
    tr = table.getElementsByTagName("tr");

    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}

// get the values of checked checkboxes and show them in the DOM 
function selectMember() {
    // Select all checkboxes using querySelectorAll.
    var checkboxes = document.querySelectorAll("input[type=checkbox]");
    let enabledMembers = [];
    let div = document.getElementById("member-add");
    
    // Use Array.forEach to add an event listener to each checkbox.
    checkboxes.forEach(function (checkbox) {
        checkbox.addEventListener('change', function () {
            enabledMembers =
            Array.from(checkboxes) // Convert checkboxes to an array to use filter and map.
            .filter(i => i.checked) // Use Array.filter to remove unchecked checkboxes.
            .map(i => i.value); // Use Array.map to extract only the checkbox values from the array of objects.

            let n = 0;
            div.innerHTML = "";
            for(let i = 0 ; i < enabledMembers.length ; i++) {
                let mmbr = ` <span> Member ${++n}: ${enabledMembers[i]} </span><br> `;
                div.innerHTML += mmbr;
            }
        })
    });
}
