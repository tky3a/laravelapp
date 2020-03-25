<table>
  <form action="/rest" method="post" accept-charset="euc-jp,us-ascii">
    {{ csrf_field() }}
    <tr>
      <th>message: </th>
      <td><input type="text" name="message" value="{{ old('message') }}"></td>
    </tr>
    <tr>
      <th>url: </th>
      <td><input type="text" name="url" value="{{ old('url') }}"></td>
    </tr>
    <tr>
      <th></th>
      <td>
        <div style="text-align: right;">
          <input type="submit" value="登録">
        </div>
      </td>
    </tr>
  </form>
</table>