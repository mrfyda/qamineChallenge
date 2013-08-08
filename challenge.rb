require 'net/http'

# get the file
`wget http://engineer.qamine.com/challenge`

# get the first line of the file
firstLine = File.open('challenge') {|file| [*file][0] }

# parse the string for the needed information
firstLine.match(/(\w+)\s(\d+)\s\w+\s(\d+).+\s(\d+)$/)
operation = $1
firstArg = $2.to_i
secondArg = $3.to_i
myId = $4

# calculate the answer
answer = case operation
         	when "multiply"
         		firstArg * secondArg
         	when "devide"
         		firstArg / secondArg
         	when "add"
         		firstArg + secondArg
         	when "subtract"
         		secondArg - firstArg
         end

#send the answer
email = "jrodriguesnum1@hotmail.com"
uri = URI('http://engineer.qamine.com/answer')
res = Net::HTTP.post_form( uri, 'payload' => answer, 'contact' => email, 'id' => myId )
puts res.body

