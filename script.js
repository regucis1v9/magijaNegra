$(document).ready(function() {
    let searchQuery = '';
    const $searchBar = $('#searchBar');
    const $searchResult = $('#searchResult');

    function updateSearchQuery() {
        searchQuery = $searchBar.val();
    }

    function performSearch() {
        console.log(`Searching for: "${searchQuery}"`);
        $searchResult.text(`Searching for: "${searchQuery}"`);
        $.ajax({
            url: 'function.php',
            type: 'POST',
            dataType: 'json', 
            data: {
                searchQuery: searchQuery
            },
            success: function(response) {
        
                if (response.length > 0) {
                    $('.Container').empty();
                    let container = $('.Container');                   
                    response.forEach(row => {
                        let id = row.id
                        let buttonId = row.id === "1" ? "one" : "two";
                        let difficulty = "Difficulty: " + row.difficulty_level;
                        let title = row.cases_title;
                        let description = row.cases_description;
                        let startDate = "Started: " + row.start_date;
                        let endDate = "Ended: " + row.end_date;
                        let status = row.solved === "yes" ? "Solved" : "Unsolved";
        
                        container.append(`
                            <a class="cases" id="${buttonId}" href="caseInfo.php?id=${id}">
                                <div class="caseDiff">${difficulty}</div>
                                <div class="caseTitle">${title}</div>
                                <div class="caseDesc">${description}</div>
                                <div class="caseDates marginTop10px">${startDate}</div>
                                <div class="caseDates">${endDate}</div>
                                <div class="caseStatus marginTop10px">${status}</div>
                            </a>
                        `);
                    });
                } else {
                    $('.Container').empty();
                    let container = $('.Container');
                    container.append(`
                            <h2> No results found </h2>
                        `);
                }
            },
            error: function(error) {
                console.log(error);
            }
        });
    }

    $searchBar.on('input', updateSearchQuery);
    $('#searchButton').on('click', performSearch);

});
function showFilters(){
    $("#overlay").toggleClass("none")
    $("#filters").toggleClass("none")
    $("#content").toggleClass("maxHeight90vh")
}
function toggleFilter(optionName){
    $("#"+optionName+"").toggleClass("none")
}
$("#easy").change(setDifficulty);
$("#hard").change(setDifficulty);
function setDifficulty(){
    let val1 = $("#easy").is(":checked");
    let val2 = $("#hard").is(":checked");
    let difficulty = "";

    if(val1 === true){
        difficulty = "easy";
    }else if(val2 === true){
        difficulty = "hard";
    }
    if(difficulty != ''){
        $.ajax({
            url: 'function.php',
            type: 'POST',
            dataType: 'json', 
            data: {
                difficulty: difficulty
            },
            success: function(response) {
                appendData(response)
            },
            error: function(error) {
                console.log(error);
            }
        });
    }

};
$("#solved").change(setSolvedState);
$("#unsolved").change(setSolvedState);
function setSolvedState(){
    let val1 = $("#solved").is(":checked");
    let val2 = $("#unsolved").is(":checked");
    let solved = "";

    if(val1 === true){
        solved = "yes";
    }else if(val2 === true){
        solved = "no";
    }
    if(solved != ''){
        $.ajax({
            url: 'function.php',
            type: 'POST',
            dataType: 'json', 
            data: {
                solved: solved
            },
            success: function(response) {
                appendData(response)
            },
            error: function(error) {
                console.log(error);
            }
        }); 
    }
}
$("#startDate").change(setDate);
$("#endDate").change(setDate);
function setDate(){
    let startDateMin= $("#startDate").val();
    let startDateMax = $("#endDate").val();

    console.log(startDateMin, startDateMax)
    if(startDateMin != '' || startDateMax != ''){
        $.ajax({
            url: 'function.php',
            type: 'POST',
            dataType: 'json', 
            data: {
                startDateMin: startDateMin,
                startDateMax: startDateMax
            },
            success: function(response) {
                appendData(response)
            },
            error: function(error) {
                console.log(error);
            }
        });  
    }
    }
    function setPriceRange(){
        let minPrice = $("#minPrice").val();
        let maxPrice = $("#maxPrice").val();

        console.log(minPrice, maxPrice)
        if(minPrice!="" || maxPrice != '')
            $.ajax({
                url: 'function.php',
                type: 'POST',
                dataType: 'json', 
                data: {
                    minPrice: minPrice,
                    maxPrice: maxPrice,
                },
                success: function(response) {
                    appendItems(response)
                },
                error: function(error) {
                    console.log(error);
                }
            });  
    }
    function filterClues(){
        let val1 = $("#important").is(":checked");
        let val2 = $("#medium").is(":checked");
        let importance = "";
    
        if(val1 === true){
            importance = "important";
        }else if(val2 === true){
            importance = "medium";
        }
        console.log(importance)
        if(importance != ''){
            $.ajax({
                url: 'function.php',
                type: 'POST',
                dataType: 'json', 
                data: {
                    importance: importance
                },
                success: function(response) {
                    console.log(response)
                    appendClues(response)
                },
                error: function(error) {
                    console.log(response)
                    console.log(error);
                }
            });
        }
    
    };
    function filterCharacters(){
        let val1 = $("#police_officer").is(":checked");
        let val2 = $("#detective").is(":checked");
        let length = $("#minLength").val()
        let job = "";
    
        if(val1 === true){
            job = "police officer";
        }else if(val2 === true){
            job = "detective";
        }
        console.log(job)
        console.log(length)
        if(job != ''){
            $.ajax({
                url: 'function.php',
                type: 'POST',
                dataType: 'json', 
                data: {
                    job: job,
                    length: length
                },
                success: function(response) {
                    appendCharacters(response)
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }
    
    };
    function filterPlayers(){
        let val1 = $("#amateur").is(":checked");
        let val2 = $("#noob").is(":checked");
        let rank = "";
    
        if(val1 === true){
            rank = "amateur";
        }else if(val2 === true){
            rank = "noob";
        }
        console.log(rank)
        if(rank != ''){
            $.ajax({
                url: 'function.php',
                type: 'POST',
                dataType: 'json', 
                data: {
                    rank: rank,
                },
                success: function(response) {
                    console.log(response)
                    appendPlayer(response)
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }
    
    };
function appendData(response){
    if (response.length > 0) {
        $('.Container').empty();
        let container = $('.Container');                   
        response.forEach(row => {
            let id = row.id
            console.log(id)
            let buttonId =  row.id === "1" ? "one" : "two";
            let difficulty = "Difficulty: " + row.difficulty_level;
            let title = row.cases_title;
            let description = row.cases_description;
            let startDate = "Started: " + row.start_date;
            let endDate = "Ended: " + row.end_date;
            let status = row.solved === "yes" ? "Solved" : "Unsolved";

            container.append(`
                <a class="cases" id="${buttonId}" href="caseInfo.php?id=${id}">
                    <div class="caseDiff">${difficulty}</div>
                    <div class="caseTitle">${title}</div>
                    <div class="caseDesc">${description}</div>
                    <div class="caseDates marginTop10px">${startDate}</div>
                    <div class="caseDates">${endDate}</div>
                    <div class="caseStatus marginTop10px">${status}</div>
                </a>
                
            `);
        });
    } else {
        $('.Container').empty();
        let container = $('.Container');
        container.append(`
                <h2> No results found </h2>
            `);
        console.log(response)
    }

}
function appendItems(response){
    if (response.length > 0) {
        $('.Container').empty();
        let container = $('.Container');                   
        response.forEach(row => {
            let itemName = row.item_name;
            let description  =row.item_description
            let itemFunction = row.function
            let price = row.price
            let availability = row.availability

            container.append(`
            <a class="cases">
            <div class="caseTitle">${itemName}</div>
            <div class="itemDesc"> Description:${description}</div>
            <div class="itemDesc"> Function:${itemFunction}</div>
            <div class="itemDesc"> Price:${price}</div>
            <div class="itemDesc"> Availability:${availability}</div>
            </a>
            
            `);
        });
    } else {
        $('.Container').empty();
        let container = $('.Container');
        container.append(`
                <h2> No results found </h2>
            `);
        console.log(response)
    }

}
function appendCharacters(response){
    if (response.length > 0) {
        $('.Container').empty();
        let container = $('.Container');                   
        response.forEach(row => {
            let character_name = row.character_name;


            container.append(`
            <a class="cases">
                <div class="caseTitle">${character_name}</div>
            </a>
            
            `);
        });
    } else {
        $('.Container').empty();
        let container = $('.Container');
        container.append(`
                <h2> No results found </h2>
            `);
        console.log(response)
    }

}
function appendClues(response){
    if (response.length > 0) {
        $('#clues').empty();
        let container = $('#clues');                   
        response.forEach(row => {
            let location = row.location;
            let clue_description = row.clue_description;

            container.append(`
            <a class="cases">
                <div class="caseTitle">${location}</div>
                <div class="caseTitle">${clue_description}</div>
            </a>
            
            `);
        });
    } else {
        $('.Container').empty();
        let container = $('.Container');
        container.append(`
                <h2> No results found </h2>
            `);
        console.log(response)
    }

}
function appendPlayer(response){
    if (response.length > 0) {
        
        $('.Container').empty();
        let container = $('.Container');                   
        response.forEach(row => {
            let rank = row.detective_rank;
            let username = row.username;

            container.append(`
            <a class="cases">
                <div class="caseTitle">${rank}</div>
                <div class="caseTitle">${username}</div>
            </a>
            s
            `);
        });
    } else {
        $('.Container').empty();
        let container = $('.Container');
        container.append(`
                <h2> No results found </h2>
            `);
        console.log(response)
    }

}
