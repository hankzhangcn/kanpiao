// index.js
// 获取应用实例
const app = getApp()


Page({
  data: {
    userInfo: {},
    hasUserInfo: "",
    // 是否可以一键获取
    canIUseGetUserProfile: wx.canIUse('getUserProfile'),
    show: false,
  },
  
  myOrders: function(event) {
    console.log(event)
  },

  showPopup() {
    this.setData({ show: true });
  },
  onClose() {
    this.setData({ show: false });
  },


  // 事件处理函数
  onLoad() {
    var that = this;
    // 将登录态存到globaldata以及当前data
    wx.getStorage({
      key: 'hasUserInfo',
      success (res){
        that.setData({
          hasUserInfo: res.data
        });
        app.globalData.hasUserInfo = res.data;
      }
    })
    // 将内存中的用户信息存到globaldata和当前data
    wx.getStorage({
      key: 'userInfo',
      success (res) {
        that.setData({
          userInfo: res.data
        });
        app.globalData.userInfo = res.data;
      }
    })

  },

  getUserProfile(e) {
    wx.getUserProfile({
      desc: '获取您的头像、昵称', 
      success: (res) => {
        console.log(res)
        // 存入用户信息
        app.globalData.userInfo=res.userInfo;
        this.setData({
          userInfo: res.userInfo,
          hasUserInfo: true
        })
        wx.setStorage({
          key: "hasUserInfo",
          data: true
        })
        wx.setStorage({
          key: "userInfo",
          data: res.userInfo
        })
      }
    })
  },

  onShareAppMessage() {
    const promise = new Promise(resolve => {
      setTimeout(() => {
        resolve({
          title: '看票'
        })
      }, 2000)
    })
    return {
      title: '看票',
      path: '/page/my',
      promise 
    }
  },


})
