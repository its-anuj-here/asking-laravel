function ifPageIs(checkPageName){
    var currentPage = window.location.pathname;
    return currentPage.endsWith(checkPageName);
}

//For Search Bar functionality
$(document).ready(function() {
    const searchText = document.getElementById('search-text');
    searchText.onkeyup = function(){
        var str=searchText.value;
        var urlStr;
        if(str.length ==0){
            urlStr = './searchCat.php?search='+str+'&allRec=1';
        }
        else{
            urlStr = './searchCat.php?search='+str+'&allRec=0';
        }
        $.ajax({
            type: 'GET',
            url: urlStr,
            dataType: 'html',
            success: function(data){
                $('#cat-container').html(data);
            }
        })
    }
});

//for deleting query
function deleteQuery(query_id){
    var urlSt = "./components/delQuery.php?q_id="+query_id;

    $.ajax({
        type:'GET',
        url: urlSt,
        dataType: 'text',
        success: function(data){
            alert(data);
        }
    });
}

function voteChange(eleId, val, isComment) {
    var urlStr;
    if(isComment==0) {
        urlStr = "./components/voteQuery.php?query_id="+eleId+"&val="+val;
    }
    else{
        urlStr = "./components/voteComment.php?comment_id="+eleId+"&val="+val;
    }
    
    $.ajax({
        type:'GET',
        url: urlStr,
        success: function(){
            location.reload();
        }
    });

}