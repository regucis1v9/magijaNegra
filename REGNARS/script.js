function submitName(){
    event.preventDefault();
    let vards = $("#vards").val();
    let uzvards = $("#uzvards").val();
    let vardaLength = vards.length;
    let uzvardaLength = uzvards.length;
    let emptyError = "";
    let lengthError = "";

    if(vards == ""){
        $("#vardsError").text("Šim laukam jābūt aizpildītam!");
        emptyError = 1;
    }else{
        $("#vardsError").text("");
    }
    if(uzvards == ""){
        $("#uzvardsError").text("Šim laukam jābūt aizpildītam!");
        emptyError = 1;
    }else{
        $("#uzvardsError").text("");
    }
    if(vardaLength + uzvardaLength>50){
        lengthError = 1;
        $("#background").toggleClass("none");
        $("#errorBox").toggleClass("none");
        $("#errorText").text("Vārda un uzvārda kopējais rakstzīmju skaits nevar pārsniegt 50.\nJūsu ir: "+vardaLength+uzvardaLength+"");
    }else{ 
        lengthError = "";
    }

    if(emptyError == "" && lengthError == ""){
        $("#guess").toggleClass("flex");
        $("#guess").toggleClass("none");
        $("#inputs").toggleClass("flex");
        $("#inputs").toggleClass("none");
        $("#guessText").text(vards+" "+uzvards)
        $("#vards").val("");
        $("#uzvards").val("");
    }
}
function closeError(){
    $("#background").toggleClass("none");
    $("#errorBox").toggleClass("none");
}
function closeGuess(){
    $("#guess").toggleClass("flex");
    $("#guess").toggleClass("none");
    $("#inputs").toggleClass("flex");
    $("#inputs").toggleClass("none");
}