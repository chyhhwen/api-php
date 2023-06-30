var request = new XMLHttpRequest();
request.open('GET', 'api_comments.php', true);
request.onload = function()
{
    if (this.status > 200 && this.status <400)
    {
        var resp = this.response;
        var json = JSON.parse(resp);
        var comments = json.comments;
        console.log(comments);
    }
}
request.send();
