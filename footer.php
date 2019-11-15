<footer class="py-3 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
        </div>
</footer>
<script>
    $("document").ready(function() {
        MarginAvatar(0);
        MarginAvatar1(0);
    })
        function MarginAvatar1(saveDistance) {
        $("#avatarShow1").css("margin-left", saveDistance);
        var avatarFrame = $(".user-info-box-header-img").width();
        var avatar = $("#avatarShow1").width();
        var distance = avatarFrame/2 - avatar/2;
        $("#avatarShow1").css("margin-left", distance);
        return distance;
        }
        function MarginAvatar(saveDistance) {
        $("#avatarShow").css("margin-left", saveDistance);
        var avatarFrame = $(".avatar-frame").width();
        var avatar = $("#avatarShow").width();
        var distance = avatarFrame/2 - avatar/2;
        $("#avatarShow").css("margin-left", distance);
        return distance;
        } 
</script>