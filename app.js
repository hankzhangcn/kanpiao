// app.js
var app = getApp();
App({
  onLaunch() {
    // 登录
    var that = this;
    wx.login({
      success: res => {
        // 发送 res.code 到后台换取 openId, sessionKey, unionId
        console.log("临时code: " + res.code)
        wx.request({
          url: that.globalData.serverAddress + 'function/wx/login.php', //接口地址
          data: {code:res.code,token:wx.getStorageSync('token')},//携带上code, token
          header: {
            'content-type': 'application/json' //默认值
          },
          // 前端不需要openid回调值，且为安全，不可回传给客户端。
          // 回调实为token，使用jsonwebtoken生成
          success: function (res) {
            wx.setStorage({
              key:"token",
              data: res.data
            })
          }
        })
      }
    })
    // user_id做本地鉴权，由于BUG，只能用这个办法了
    wx.request({
      url: 'url',
    })
    
  },

  globalData: {
    code: "",
    token:"",
    havetoken: false,
    hasUserInfo: "",
    userInfo: [],
    serverAddress: "http://192.168.137.1:8008/"
    // serverAddress: "http://localhost:8008/"
  }
})
