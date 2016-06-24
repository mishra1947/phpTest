// complete the function
function vowelsAndConsonants(s) { 
    var consonant = [];
    for(var i = 0; i< s.length; i++){
        if(s[i]==='a' || s[i]==='e' || s[i]==='i' || s[i]==='o' || s[i]==='u' ){
           console.log(s[i]);
        }else{
            consonant[i]= s[i]; 
        }
    }
    var string = (consonant.toString()).replace(/\,/g,"");
 for(var j=0; j<string.length; j++){
     console.log(string[j]);
 }
}