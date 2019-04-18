/*your Nationality*/
/*

$(function () {
   
    'use strict';
    
    var CountSelect = $('.countries'),
    
        myCountries = ['select your country','Egypt', 'Kuwait', 'Libyan', 'Tunis'],
        
        Egypt = ['select your city','Cairo', 'Alexandria', 'Giza', 'Shubra el-Khema ', 'Port Said','Suez' ,'El Mahalla el Kubra' ,'El Mansoura' ,'Tanta' ,'Asyut' ,'Fayoum'  ,'Zagazig' ,'Ismailia' ,'Khusus' ,'Aswan' ,'Damanhur' ,'El-Minya' ,'Damietta' ,'Luxor' ,'Qena' ,'Beni Suef' ,'Sohag' ,'Shibin el-Kom' ,'Hurghada','Banha' ,'Kafr al-Sheikh' ,'Mallawi' ,'El Arish' ,'Belbeis' ,'10th of Ramadan Cit' ,'Marsa Matruh' ,'Mit Ghamr' ,'Kafr el-Dawwar' ,'Qalyub' ,'Desouk' ,'Abu Kabir' ,'Girga' ,'Akhmim' ,'El-Matareya' ,'Edko' ,'Bilqas' ,'Zifta' ,'Samalut'  ],

        Kuwait = ['select your city','Amundsen-Scott'],
        
        Libyan = ['select your city','Bangladesh', 'Bhutan', 'Brunei', 'Cambodia', 'China', 'East Timor', 'India'],
        
        Tunis = ['select your city','Albania', 'Andorra', 'Austria', 'Belarus', 'Belgium', 'Bosnia-Herzegovina', 'Bulgaria'];
        
    // Function Create Option    
    
    function CreateOption(valriable, elementToAppend) {
        
        var i;
        
        for (i = 0; i < valriable.length; i += 1) {
    
            $('<option>', {value: valriable[i], text: valriable[i], id: valriable[i]})
                .appendTo(elementToAppend);
        }
    }


    // Create Option myCountries
    CreateOption(myCountries, $('.countries'));
    
    // Create Option Africa
    CreateOption(Egypt, $('.Egypt'));
    
    // Create Option Africa
    CreateOption(Kuwait, $('.Kuwait'));
    
    // Create Option Africa
    CreateOption(Libyan, $('.Libyan'));
    
    // Create Option Africa
    CreateOption(Tunis, $('.Tunis'));
    
    // Hide All Select
    $('.option select').hide();
    
    // Show First Selected
    $('.Africa').show().css('display', 'inline-block');
    
    
    
    // Show List Option City Whene user Chosse Countries
    
    CountSelect.on('change', function () {
        
        // get Id option 
        var myId = $(this).find(':selected').attr('id');
        console.log($(this).val());
        // Show Select Has class = Id And Hide Siblings
        $('.option select').filter('.' + myId).fadeIn(400).siblings('select').hide();
        
    });
});
*/

/*End Of Nationality*/


$(function(){
    var $select = $(".years");
    for (i=2019;i>=1950;i--){
        $select.append($('<option></option>').val(i).html(i))
    }
});


/*education*/
/*
var inputs = document.getElementsByTagName("input");
var products = [];
function addEducation(){
    var degree=document.getElementById("degree").value;
    var universityName =document.getElementById("universityName").value;
    var fieldName = document.getElementById("fieldName").value;
    var edu={unvirsity:universityName ,field: fieldName , degree:degree};
    products.push(edu);
    display();
    clearform();
}
function display()
{
    var temp = '';
    for (var i = 0; i < products.length; i++) {
        temp += "<span>" + products[i].degree +"</span><span> in "+products[i].unvirsity+"</span><span>"+products[i].field +"</span>"
    }
    displaay = document.getElementById("display");
     displaay.innerHTML = temp;
}
function clearform() {
    for (var i = 0; i < inputs.length; i++) {
        inputs[i].value = '';
    }
}*/
$(document).ready(function () {

    $("#Stile-work").click(function () {
        $("#date-end").css("display", "none");

    });
    $("#btn2").click(function (e) {
        e.preventDefault();
        $(".achievement").append('<input type="file" id="input01" class="filestyle form-control" name="file[]">');
    });
});

