// app.js
var app = getApp();
App({
  onLaunch() {
    // // 展示本地存储能力
    // const logs = wx.getStorageSync('logs') || []
    // logs.unshift(Date.now())
    // wx.setStorageSync('logs', logs)

    // 登录
    // 如果已经有token
    if(wx.getStorageSync('token'))
    {
      // 校验token是否过期
      wx.request({
        url: this.globalData.serverAddress + 'function/wx/check_token.php',
        data: {token:wx.getStorageSync('token')},
        header: {
          'content-type': 'application/json' //默认值
        },
        success: function(res){
          // 如果没有过期
          if(res.data == 'true')
          {
            // 直接登录展示用户信息
          }
        }
      })
    }
    // 否则：没有token或者token过期了
    // 获取code并换取新的token
    else
    {
      wx.login({
        success: res => {
          // 发送 res.code 到后台换取 openId, sessionKey, unionId
          console.log("临时code: " + res.code)
          wx.request({
            url: this.globalData.serverAddress + 'function/wx/login.php', //接口地址
            data: {code:res.code},//携带上code
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
    } 


    
  },

  globalData: {
    code: "",
    hasUserInfo: "",
    userInfo: [],
    serverAddress: "http://localhost:8008/"
  }
})
