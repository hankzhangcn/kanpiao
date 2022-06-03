// pages/buy/buy.js
var app = getApp();
var that = this;

Page({

  /**
   * 页面的初始数据
   */
  data: {
    show_id: "",
    session_id: "",
    buy_num:"1",
    show_detail: [],
    session_detail:[],
    total_price:""
  },




  /**
   * 生命周期函数--监听页面加载
   */
  onLoad(options) {
    var that =  this;
    // 接受GET参数
    this.setData({
      show_id:options.show_id,           //articleID问pageB页面变量
      session_id:options.session_id           //articleID问pageB页面变量
     })
    //  获取演出信息
     wx.request({
      url:  app.globalData.serverAddress +'function/wx/get_show_detail.php',
      method: 'GET',
      data: {
        show_id: that.data.show_id
      },
      header: {
        'Accept': 'application/json'
      },
      success: function (res) {
        // console.log(res.data);
        that.setData({
          show_detail:res.data
        })
      }
    })
    // 获取场次信息
    wx.request({
      url:  app.globalData.serverAddress +'function/wx/get_session_detail.php',
      method: 'GET',
      data: {
        session_id: that.data.session_id
      },
      header: {
        'Accept': 'application/json'
      },
      success: function (res) {
        console.log(res.data);
        that.setData({
          session_detail:res.data,
          total_price:res.data[0].session_price
        })
      }
    })
  },

  /**
   * 生命周期函数--监听页面初次渲染完成
   */
  onReady() {

  },

  /**
   * 生命周期函数--监听页面显示
   */
  onShow() {

  },

  /**
   * 生命周期函数--监听页面隐藏
   */
  onHide() {

  },

  /**
   * 生命周期函数--监听页面卸载
   */
  onUnload() {

  },

  /**
   * 页面相关事件处理函数--监听用户下拉动作
   */
  onPullDownRefresh() {

  },

  /**
   * 页面上拉触底事件的处理函数
   */
  onReachBottom() {

  },

  /**
   * 用户点击右上角分享
   */
  onShareAppMessage() {

  },
  onChange(event) {
    var that = this;
    that.setData({
      buy_num: event.detail
    })
    wx.request({
      url:  app.globalData.serverAddress +'function/wx/get_total_price.php',
      method: 'GET',
      data: {
        session_id: that.data.session_id,
        buy_num: event.detail
      },
      header: {
        'Accept': 'application/json'
      },
      success: function (res) {
        // console.log(res.data);
        that.setData({
          total_price:res.data
        })
      }
    })
  },
  payment(){
    var that = this;
    wx.request({
      url:  app.globalData.serverAddress +'function/wx/new_order.php',
      method: 'GET',
      data: {
        session_id: that.data.session_id,
        buy_num: that.data.buy_num,
        token: wx.getStorageSync('token')
      },
      header: {
        'Accept': 'application/json'
      },
      success: function (res) {
        wx.navigateTo({
          url: '/pages/buy_ok/buy_ok'
        })
      }
    })
  }

  
})