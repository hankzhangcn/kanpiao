//使用JQuery内的整合的 $.Ajax 向服务器请求用户名唯一验证 正则限制纯数字 密码与重复输入密码统一验证
$(document).ready(function () {
    //绑定松开按键事件
    $("#Pw").keyup(checkPass);
    $("#Repw").keyup(checkRePass);

    //提交表单,调用验证函数
    $("#myForm").submit(function (e) {
        e.preventDefault();
        if (checkPass() == true && checkRePass() == true )
            $("#myForm").unbind('submit').submit();
    });
})

//验证输入密码
function checkPass() {
    var Pw = $("#Pw").val();
    var divPw = $("#divPw");
    divPw.html("");
    if (Pw == "") {
        divPw.html("密码不能为空");
        document.getElementById("Pw").classList.remove("is-valid");
        document.getElementById("Pw").classList.add("is-invalid");
        return false;
    }
    if (Pw.length < 6) {
        document.getElementById("Pw").classList.remove("is-valid");
        document.getElementById("Pw").classList.add("is-invalid");
        divPw.html("密码必须等于或大于6个字符");
        return false;
    }
    document.getElementById("Pw").classList.add("is-valid");
    document.getElementById("Pw").classList.remove("is-invalid");
    return true;
}
//验证重复密码
function checkRePass() {
    var Pw = $("#Pw").val(); //输入密码
    var Repw = $("#Repw").val();  //再次输入密码
    var divRepw = $("#divRepw");
    divRepw.html("");
    if (Pw != Repw) {
        divRepw.html("两次输入的密码不一致");
        document.getElementById("Repw").classList.remove("is-valid");
        document.getElementById("Repw").classList.add("is-invalid");
        return false;
    }
    document.getElementById("Repw").classList.add("is-valid");
    document.getElementById("Repw").classList.remove("is-invalid");
    return true;
}