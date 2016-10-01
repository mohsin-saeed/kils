PAGE_WIDTH = 0;
PAGE_HEIGHT = 0;


DECIDED_HEIGHT = 563;
DECIDED_WIDTH = 998;


function initPageEventBinding(page){
    var objects = page.objects
    $.each(objects, function(index, value){
        var str = "";
        var obj_elem = "#obj-"+value.id;
        objStrArr = [];
        count = 0;
        oid = 0;
        $.each(value.states, function(ind, state){
            state.oid = value.id;
            if(count == 0){
                setFistState(state)
            }
            objStrArr[count++] = getActionStr(state, 1, 32);
            //str +=  "move('"+obj_elem+"'). "
        })
        bindObjectAnimation(value.id, objStrArr, value)
    });
}

function setFistState(state){
    // ----- setting styles first ---//
    $width = (state.width*WF);
    $height = (state.height*HF);
    $objEl = $("#obj-"+state.oid);
    $objEl.css({width: $width+'px', height: $height+'px', 'background-size': '100%'});
    // ----- moving to actual positions ----- //
    var cor = getPixalCordinate(state);
    var str = "move('#obj-"+state.oid+"').x("+cor.x+").y("+cor.y+").duration("+state.duration+").delay("+state.delay+").end()";
    eval(str);
}

function getActionStr(state, bid, pid){

    var str = "";
    var innerStr = getActionStrInner(state,  bid, pid);
    var cor = getPixalCordinate(state);
    if(state.action == 'rotate'){
        state.effect = state.action;
    }else if(state.action == 'skew'){
        state.effect = state.action;
    }else if(state.action == 'scale'){
        state.effect = state.action;
    }
    if(state.effect){
        str = "move('#obj-"+state.oid+"').x("+cor.x+").y("+cor.y+")."+state.effect+"("+state.degree+").duration("+state.duration+").delay("+state.delay+")"+innerStr;
    }else{
        str = "move('#obj-"+state.oid+"').x("+cor.x+").y("+cor.y+").duration("+state.duration+").delay("+state.delay+")"+innerStr;
    }
    return str;
}

function getActionStrInner(state , bid, pid){
    var hostUrl = "";
    if(hostUrl){
        hostUrl = "/"+hostUrl;
    }else{
        hostUrl = "";
    }
    var str = "";
    if(state.bg){
        //str = "jQuery('#obj-"+state.oid+"').css('background-image','url("+hostUrl+"/sites/default/files/books/book_"+bid+"/page_"+pid+"/assets/"+state.image+")')";
        str = ".set('background-image','url("+state.bgRelPath+")') ";
    }

    return str;
}

function getPixalCordinate(state){
    var cor = {};
    var calcY = 100 - parseInt(state.y);
    cor.x = (parseInt(state.x)*PAGE_WIDTH)/100;
    cor.y = ((calcY*PAGE_HEIGHT)/100) - (HF*state.height);
    return cor;
}

function bindObjectAnimation(object, strArr){
    //object.

    var str = "";
    for(var i=1; i < strArr.length; i++){
        str += strArr[i]+".end(";
    }
    for(var i=1; i < strArr.length; i++){
        str += ")";
    }


    //eval(strArr[0]);
    if(strArr[1]){
        $("#obj-"+object).click( function() {
            console.log("clicked obect")
            console.log(str);
            eval(str);
        });
    }
}


//function setAudioObjects(texts, bid, pid){
//    var readToMe =  true;
//    $.each(texts, function(ind, states){
//        var firstIndex = first(states);
//        var state = states[firstIndex];
//        var str = "$('#object-" + state.oid + "').show('slow')";
//        eval(str);
//        if(readToMe){
//            var str = "$('#object-" + state.oid + "').trigger('click')";
//            setTimeout(function(){
//                    eval(str);
//                },
//                1500)
//        }
//        return false;
//    });
//}

function playAudio(audio, objId){
    audio.play();
    audio.onended = function() {
        setTimeout(function(){
            getSwirl(objId)
        },1500)
    };
}

var swirlAngle = 0;

function getSwirl(id){
    var DomEl = "#obj-"+id+"-s";
    var swirlEl = $(DomEl);
    swirlEl.show();
    //swirlAngle+= 1000;
    console.log(DomEl);
    console.log(swirlEl);
    move(DomEl).rotate(0).duration(0).end();
    move(DomEl).rotate(1000).duration(2000).end(function(){
        //move(DomEl).rotate(0).duration(0).end();
        //setTimeout(function(){
            swirlEl.hide();
        //},10);

    });
}

$( document ).ready(function() {
    PAGE_WIDTH = Math.round($(document).width()*.6);
    PAGE_HEIGHT = (PAGE_WIDTH/16)*9; // Formula for aspect reation i think 16:9
    console.log( "ready!" ); //bg-dialog

    WF = PAGE_WIDTH/DECIDED_WIDTH;
    HF = PAGE_HEIGHT/DECIDED_HEIGHT;

    var pageStyle = {
        width: PAGE_WIDTH+"px",
        height: PAGE_HEIGHT+"px"
    };

    $pagesDiv= $(".book-pages");
    $allPagDivs= $(".playing-canvas");

    $pagesDiv.css(pageStyle);
    $allPagDivs.css(pageStyle);
    //$allPagDivs.css({"background-size": '"'.PAGE_HEIGHT+'px '.PAGE_HEIGHT+'px"'});



    var mySwiper = new Swiper('.swiper-container',{

        loop:false,
        grabCursor: true,
        onSlideChangeEnd: function(swiper){
            document.getElementById("obj-sounds").innerHTML = "";

            var objectId = -1;
            if(bookPages[swiper.activeIndex]["objects"][0] && bookPages[swiper.activeIndex]["objects"][0].id){
                objectId = bookPages[swiper.activeIndex]["objects"][0].id
            }

            if(bookPages[swiper.activeIndex].audioRelPath){
                var audio = document.querySelector("audio#playme-"+swiper.activeIndex);
                playAudio(audio, objectId);
            }else if(objectId != -1){
                getSwirl(objectId);
            }
            if(swiper){
                //if($(swiper.activeSlide()).data("visited")){
                //    //setInitialObjectsStates(bookPages[swiper.activeIndex].objects, bookPages[swiper.activeIndex].bid, bookPages[swiper.activeIndex].pid);
                //
                //}
                //setAudioObjects(bookPages[swiper.activeIndex].texts, bookPages[swiper.activeIndex].bid, bookPages[swiper.activeIndex].pid);
                //$(swiper.activeSlide()).data("visited", true);
            }


        }
    });

    console.log(bookPages);

    $.each(bookPages, function( index, page ) {
        initPageEventBinding(page);
    });

    setTimeout(function(){
        $("#loading-div").hide();
    },3000)
});
