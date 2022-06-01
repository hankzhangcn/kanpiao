// index.js
// 获取应用实例
const app = getApp()
import Dialog from '/../../miniprogram_npm/@vant/weapp/dialog/dialog';

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
// 控制朋友圈提示显示
  showPopupMoments() {
    this.setData({ moments: true });
  },
  onCloseMoments() {
    this.setData({ moments: false });
  },
// 控制登出提示
showPopupLogout() {
  this.setData({ moments: true });
},
onCloseLogout() {
  this.setData({ moments: false });
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
    console.log(e);
    wx.getUserProfile({
      desc: '获取您的头像、昵称', 
      success: (res) => {
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
        // 存入数据库
        wx.request({
          url: app.globalData.serverAddress + 'function/wx/save_user_info.php',
          // method: 'POST',
          data:{
          user_info: res.userInfo,
          token: wx.getStorageSync('token')},
          success:(res)=>{
            console.log(res.data)
          }
        })
      }
    })
  },

  // 登出

  
  logout(e){
    Dialog.confirm({
      title: '退出登录',
      message: '您确认要退出登录吗？',
    })
      .then(() => {
        wx.setStorage({
          key: "hasUserInfo",
          data: false
        })
        this.setData({hasUserInfo: false});
        app.globalData.hasUserInfo = false;
      })
      .catch(() => {
        // on cancel
      });

  },
// 分享
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
  about_page(){
    wx.navigateTo({
      url: '/pages/about/about'
    })
  },
  // 测试页面
  test_page(){
    wx.navigateTo({
      url: '/pages/home/index'
    })
  }


})
