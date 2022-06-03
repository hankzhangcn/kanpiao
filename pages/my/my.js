// index.js
// 获取应用实例
const app = getApp();
var that = this;

import Dialog from '/../../miniprogram_npm/@vant/weapp/dialog/dialog';

Page({
  data: {
    userInfo: {},
    hasUserInfo: "",
    is_checker: false ,
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

    // 检查储存里是否是管理员
    wx.getStorage({
      key: 'is_checker',
      success (res){
        that.setData({
          is_checker: res.data
        });
      }
      
    })
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
          }
        })
        // 登录身份
        wx.request({
          url: app.globalData.serverAddress + 'function/wx/is_checker.php',
          // method: 'POST',
          data:{
          token: wx.getStorageSync('token')},
          success:(res)=>{
            if(res.data == true)
            {
              wx.setStorage({
                key: "is_checker",
                data: true
              })
              Dialog.confirm({
                title: '检票员模式',
                message: '您是检票员，要进入管理页面吗？',
              })
                .then(() => {
                  wx.navigateTo({
                    url: '/pages/checker_page/checker_page',
                  })
                })
                .catch(() => {
                  // on cancel
                });
            }
            else{
              wx.setStorage({
                key: "is_checker",
                data: false
              })
            }
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
        wx.setStorage({
          key: "is_checker",
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
  checker_page(){
    wx.navigateTo({
      url: '/pages/checker_page/checker_page'
    })
  },
  orders_page(){
    wx.navigateTo({
      url: '/pages/orders/orders'
    })
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
