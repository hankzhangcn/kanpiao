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
      var that = this;
      // 校验token是否过期
      wx.request({
        url: this.globalData.serverAddress + 'function/wx/is_token_expired.php',
        data: {token:wx.getStorageSync('token')},
        header: {
          'content-type': 'application/json' //默认值
        },
        success: function(res){
          console.log(res.data);
          // 如果没有过期
          if(res.data == true)
          {
            console.log("token pass");

            // 直接登录展示用户信息
          }
          // 过期则获取并覆写
          else
          {
            console.log("token expired");
            wx.login({
              success: res => {
                // 发送 res.code 到后台换取 openId, sessionKey, unionId
                console.log("临时code: " + res.code)
                wx.request({
                  url: that.globalData.serverAddress + 'function/wx/login.php', //接口地址
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
        }
      })
    }
    // 否则：没有token
    // 获取code并换取token
    else
    {
      console.log("no token");
      wx.login({
        success: res => {
          // 发送 res.code 到后台换取 openId, sessionKey, unionId
          // console.log("临时code: " + res.code)
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
    serverAddress: "http://192.168.137.1:8008/"
    // serverAddress: "http://localhost:8008/"
  }
})
