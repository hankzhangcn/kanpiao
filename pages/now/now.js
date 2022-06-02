// pages/now/now.js
Page({

  /**
   * 页面的初始数据
   */
  data: {
    newest_session_qrcode:"",
    show_detail:[],
    session_detail:[],
    have_newest_session: false,

  },

  /**
   * 生命周期函数--监听页面加载
   */
  onLoad(options) {
    var app = getApp();
    var that = this;

    wx.stopPullDownRefresh()
    // 获取二维码
    wx.request({
      url: app.globalData.serverAddress + 'function/wx/generate_qrcode.php',
      data: {token:wx.getStorageSync('token')},
      success: (res)=>{
        // console.log(res.data);
        if(res.data == 0)
        {
          that.setData({
            have_newest_session: false
          })
        }
        // 有直接获取
        else{
          that.setData({
            newest_session_qrcode: res.data,
            have_newest_session: true            
          })
          // 获取演出详情
          wx.request({
            url: app.globalData.serverAddress + 'function/wx/get_first_show_detail.php',
            data: {token:wx.getStorageSync('token')},
            success: (res)=>{
              console.log(res.data);
              that.setData({
                show_detail: res.data
              })
            }
          })
          // 获取场次详情
          wx.request({
            url: app.globalData.serverAddress + 'function/wx/get_first_session_detail.php',
            data: {token:wx.getStorageSync('token')},
            success: (res)=>{
              console.log(res.data);
              that.setData({
                session_detail: res.data
              })
            }
          })
        }
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
    this.onLoad(); //重新加载onLoad()
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

})