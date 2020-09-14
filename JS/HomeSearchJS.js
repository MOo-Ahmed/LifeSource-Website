$(document).ready(function(){
    function fetchDonorsFromDB(){
        $.ajax({
            url: 'processSearchForDonors.php',
            type: 'POST',
            data: { blood: document.getElementById("bloodType").value},
            success: function(data){
                var res = JSON.parse(data);
                showDonors(res);
            }
        });
    }

    function hideCurrentDonors (){
        var  c = document.querySelector('.stackCards').children;
        var i;
        for (i = 0; i < c.length; i++) {
            c[i].style.display = "none";
        }
    }

    function showDonors(data){
        for (var i = 0 ; i < data.length; i++) {
            var  SearchResults = document.querySelector('.stackCards');
            var tempDonor = document.createElement("div");
            tempDonor.classList.add('card', "box-shadow");
            var donorHeader = document.createElement("div");
            donorHeader.classList.add('cardTitle');
            var donorBody = document.createElement("div");
            donorBody.classList.add('cardBody');
            var donorFooter = document.createElement("div");
            donorFooter.classList.add('cardFooter');

            /* Title content */
            var username = document.createElement("h3");
            username.innerHTML = data[i].Name ;
            donorHeader.appendChild(username);
            //username.classList.add() ;
            
            /* Body content */
            var blood = document.createElement("h5") ;
            blood.innerHTML = "Blood Type : ".concat(data[i].BloodType) ;
            //blood.className = "card-text" ;
            var city = document.createElement("h5") ;
            city.innerHTML = "City : ".concat(data[i].City) ;
            var age = document.createElement("h5") ;
            age.innerHTML = "Age : ".concat(data[i].Age) ;
            donorBody.appendChild(blood);
            donorBody.appendChild(city);
            donorBody.appendChild(age);
            
            /*Footer Content */
            var phone = document.createElement("h5") ;
            phone.innerHTML = "Phone : ".concat(data[i].Phone) ;
            donorFooter.appendChild(phone);
            
            /*Make up the whole content*/
            tempDonor.appendChild(donorHeader);
            tempDonor.appendChild(donorBody);
            tempDonor.appendChild(donorFooter);
            SearchResults.appendChild(tempDonor) ;
        }
    }

    //fetchDonorsFromDB();

    $(document).on('click', '#getDonorsBtn', function(){
        //hideCurrentDonors();
        fetchDonorsFromDB();
    });
});