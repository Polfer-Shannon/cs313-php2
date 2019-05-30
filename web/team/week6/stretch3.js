$(document).ready(function(){
    $("#new-scripture-form").on("submit", function(event){
        event.preventDefault();
        
        var book = $("#book").val();
        var chapter = $("#chapter").val();
        var verse   = $("#verse").val();
        var content = $("#content").val();
        var topics  = $('.checkbox-topics:checked').serialize();
        var newtopic = $("#newtopic").is(':checked');
        var newtopictext = $("#newtopictext").val();
        
        $.post('ajax_new_scripture.php', {
                'book' : book,
                'chapter' : chapter,
                'verse' : verse,
                'content' : content,
                'topics'  : topics,
                'newtopic' : newtopic,
                'newtopictext' : newtopictext
            } , function(data){
                $("#scripture-list").html(data);
            }, 'html'
        );
    });
});