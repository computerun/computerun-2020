var majorList = [
    {
        name: "Accounting",
        regex: /^( )*((Akuntan(si){0,1})|(Acc(ount(ing|ant)){0,1}))( )*$/gi
    },
    {
        name: "Computer Science",
        regex: /^( )*((T(eknik){0,1}( )*I(nformatika){0,1})|(IT)|(Comp(uter){0,1}( )*Sci(ence){0,1}))( )*$/gi
    },
    {
        name: "Computer Science, Global Class",
        regex: /^( )*((T(eknik){0,1}( )*I(nformatika){0,1})|(IT)|(C(omp(uter){0,1}){0,1}( )*S(ci(ence){0,1}){0,1}))[ (,-:]+(G(lobal){0,1}( )*C(lass){0,1})\){0,1}( )*$/gi
    },
    {
        name: "Computer Science, Master Track",
        regex: /^( )*((T(eknik){0,1}( )*I(nformatika){0,1})|(IT)|(C(omp(uter){0,1}){0,1}( )*S(ci(ence){0,1}){0,1}))[ (,-:]+(M(aster){0,1}( )*T(rack){0,1})\){0,1}( )*$/gi
    },
    {
        name: "Cyber Security",
        regex: /^( )*C(y(ber){0,1}){0,1}( )*S(ec(urity){0,1}){0,1}( )*$/gi
    },
    {
        name: "Game Application and Technology",
        regex: /^( )*G(ame){0,1}( )*A(pp(lication){0,1}(s){0,1}){0,1}( )*((and)|&){0,1}( )*T(ech(nology){0,1}){0,1}( )*$/gi
    },
    {
        name: "DKV Animation",
        regex: /^( )*D(esain){0,1}( )*K(omunikasi){0,1}( )*V(isual){0,1}[ (,-:]+A(nim((asi)|(ation)){0,1}){0,1}\){0,1}( )*$/gi
    },
    {
        name: "DKV Creative Advertising",
        regex: /^( )*D(esain){0,1}( )*K(omunikasi){0,1}( )*V(isual){0,1}[ (,-:]+C(reative){0,1}( )*A(d(vert(ising){0,1}){0,1}){0,1}\){0,1}( )*$/gi
    },
    {
        name: "DKV New Media",
        regex: /^( )*D(esain){0,1}( )*K(omunikasi){0,1}( )*V(isual){0,1}[ (,-:]+N(ew){0,1}( )*M(edia){0,1}\){0,1}( )*$/gi
    },
    {
        name: "Food Technology",
        regex: /^( )*Food( )*Tech(nology){0,1}( )*$/gi
    },
    {
        name: "Information Systems",
        regex: /^( )*((I(nfo(rmation){0,1}){0,1}( )*S(ys(tem(s){0,1}){0,1}){0,1})|(S(is(tem){0,1}){0,1})( )*((I(nfo(rmasi){0,1}){0,1})|(fo)))( )*$/gi
    },
    {
        name: "Magister Computer Science",
        regex: /^( )*((Magister)|(S2))( )*((T(eknik){0,1}( )*I(nformatika){0,1})|(IT)|(C(omp(uter){0,1}){0,1}( )*S(ci(ence){0,1}){0,1}))( )*$/gi
    },
    {
        name: "Marketing Communication",
        regex: /^( )*Mar(ket(ing){0,1}){0,1}( )*Com(m(unication(s){0,1}){0,1}){0,1}( )*$/gi
    },
    {
        name: "Mass Communication",
        regex: /^( )*Mas(s){0,1}( )*Com(m(unication(s){0,1}){0,1}){0,1}( )*$/gi
    },
    {
        name: "Mobile Application and Technology",
        regex: /^( )*M(obile){0,1}( )*A(pp(lication){0,1}(s){0,1}){0,1}( )*((and)|&){0,1}( )*T(ech(nology){0,1}){0,1}( )*$/gi
    }
]

function phoneNumberAutofill(id){
    document.getElementById(id).value = (document.getElementById("action-change-phone").value == "") ? document.getElementById("action-change-phone").placeholder : document.getElementById("action-change-phone").value;
}

function updateCart(){
    var total = 0, res = "";
    var query = document.querySelectorAll(".eventitem:checked");

    query.forEach(function (data){
        if(data.attributes["data-price"]) total += parseInt(data.attributes["data-price"].nodeValue);
    });

    if (query.length > 0){
        res += "<h4>TOTAL PRICE</h4>";
        res += "<h1>Rp " + total + "</h1>";
        if (total > 0){
            res += '<label for="evidence">Payment Receipt: </label><input type="file" id="evidence" name="evidence" accept="image/*" required>';
        }
        res += '<input type="hidden" name="total" value="' + total + '">';
        res += '<button type="submit" class="btn btn-primary">Submit</button>';
        document.getElementById("confirmation").innerHTML = res;
    } else {
        document.getElementById("confirmation").innerHTML = "Please select one of the events before submitting.";
    }
}

function autofillMajor(id){
    // Autofill major nicknames and alternative nicknames
    // Database based on https://gist.github.com/reinhart1010/43e9544172c501055f5a5067ed317843
    var init = document.getElementById(id).value;
    var initial = init.toLowerCase().charCodeAt(0);
    var i;

    // Optimization to reduce algorithmic complexity to be closer to O(n/2)
    if (initial - "a".charCodeAt(0) < "z".charCodeAt(0) - initial) for (i = 0; i < majorList.length; i++){
        if (init.match(majorList[i].regex)){
            init = majorList[i].name;
            break;
        }
    } else for (i = majorList.length - 1; i >= 0; i--){
        if (init.match(majorList[i].regex)){
            init = majorList[i].name;
            break;
        }
    };
    document.getElementById(id).value = init;
}

function binusianToggle(enabled){
    var query = document.querySelectorAll(".binusian-only");
    query.forEach(function (data){
        data.required = enabled;
        data.style.display = (enabled) ? "block" : "none";
    });
}
