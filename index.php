<?php
// Check if the request is an AJAX POST for processing the chatbot response
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['message'])) {
    // Load chatbot data from an array (you can still load from a JSON file if needed)
    $chatData = [
        "hello" => "Hi there! How can I help you today?",
        "how are you" => "I'm just a program, but thanks for asking!",
        "help" => "Sure, I'm here to help. What do you need?",
        "bye" => "Goodbye! Have a great day!",
        "assalamu alaikum" => "Wa Alaikum Assalam!",
        "tum kartay kya ho?" => "mai tumhari madad karta hun!",
        "jazak allah" => "Waiyyakum!",
        "what's your name" => "I'm your friendly chatbot.",
        "who are you" => "I'm chatbot AI, Think of me like an assistant who's here to help you learn, plan, and create. How can I assist you?",
        "tell me a joke" => "Why don't scientists trust atoms? Because they make up everything!",
        "i love you in korean" => "sarangeho!",
        "i love you in chinese" => "wo aai ni!",
        "tumhay hindi ati hai?" => "Ha! ap kya janna chahtay?",
        "hi" => "hi! how can i help you.",
        "what is php" => "PHP is a server-side scripting language designed for web development.",
        "what is javascript" => "JavaScript is a programming language used for web development to create dynamic content.",
        "what is html" => "HTML is the standard markup language for creating web pages.",
        "tell me about css" => "CSS is a stylesheet language used to describe the presentation of a document written in HTML or XML.",
        "who created you" => "I was created by developers to assist with various tasks.",
        // ** IoT (Internet of Things) **
    "what is iot?" => "IoT, or the Internet of Things, refers to the network of physical objects embedded with sensors and software to exchange data over the internet.",
    "how does iot work?" => "IoT works by connecting devices to the internet, allowing them to collect and exchange data to automate processes or provide insights.",
    "what are iot devices?" => "IoT devices include smart thermostats, wearable fitness trackers, connected security cameras, smart home appliances, and more.",
    "what are the benefits of iot?" => "IoT provides automation, real-time monitoring, data-driven insights, and increased efficiency in industries such as healthcare, transportation, and smart homes.",
    "what are the risks of iot?" => "IoT devices can be vulnerable to security risks, such as data breaches, hacking, and privacy concerns due to weak encryption.",
    "what is a smart home?" => "A smart home uses IoT devices to automate and control household functions like lighting, heating, and security remotely.",
    "how is iot used in healthcare?" => "IoT in healthcare enables remote patient monitoring, wearable health trackers, and smart medical devices to improve patient care and efficiency.",
    "what is industrial iot (iiot)?" => "Industrial IoT refers to the application of IoT technology in industries like manufacturing, energy, and transportation to improve operations and productivity.",
    "what is edge computing in iot?" => "Edge computing allows data to be processed closer to the source of data generation (at the 'edge') instead of in a centralized cloud, reducing latency and bandwidth use.",
    "what is 5g’s role in iot?" => "5G enhances IoT by providing faster data speeds, lower latency, and the ability to connect a massive number of devices, enabling smarter cities and industries.",
    
    // ** Artificial Intelligence (AI) **
    "what is artificial intelligence?" => "AI refers to the simulation of human intelligence in machines, enabling them to perform tasks like learning, reasoning, and problem-solving.",
    "how does ai work?" => "AI works through algorithms that allow machines to process data, learn from it, and make decisions based on that data.",
    "what is the difference between ai and machine learning?" => "AI is the broader concept of machines performing tasks intelligently, while machine learning is a subset of ai where machines learn from data.",
    "what is natural language processing (nlp)?" => "NLP is a branch of AI that enables computers to understand, interpret, and respond to human language.",
    "what are ai chatbots?" => "AI chatbots are programs that use AI to simulate human-like conversations, providing automated customer service, information, or assistance.",
    "what is the turing test?" => "The Turing Test is a test to determine whether a machine can exhibit human-like intelligence, where a human cannot tell if they are interacting with a machine.",
    
    // ** Machine Learning (ML) **
   
    "what is supervised learning?" => "Supervised learning involves training a machine learning model on labeled data, where the desired output is known.",
    "what is unsupervised learning?" => "Unsupervised learning involves using data without labeled outcomes to find hidden patterns or intrinsic structures.",
    "what is reinforcement learning?" => "Reinforcement learning is a type of machine learning where an agent learns to make decisions by receiving rewards or penalties.",
    "what are neural networks?" => "Neural networks are machine learning models inspired by the human brain that consist of interconnected nodes (neurons) to recognize patterns and data relationships.",
    "what is deep learning?" => "Deep learning is a subset of machine learning that uses neural networks with many layers (deep networks) to analyze complex data sets like images or text.",
    
    // ** Blockchain & Cryptocurrencies **
    "what is blockchain?" => "Blockchain is a decentralized, distributed ledger technology that records transactions across multiple computers securely and transparently.",
    "how does blockchain work?" => "Blockchain works by recording transactions in blocks, which are then linked together in a chain. Each block contains a timestamp and a cryptographic hash of the previous block.",
    "what is cryptocurrency?" => "Cryptocurrency is a type of digital or virtual currency that uses cryptography for security, such as Bitcoin, Ethereum, and Litecoin.",
    "what is bitcoin?" => "Bitcoin is the first and most well-known cryptocurrency, created by an unknown person or group using the pseudonym Satoshi Nakamoto in 2008.",
    "what is ethereum?" => "Ethereum is a decentralized platform that allows developers to build and deploy smart contracts and decentralized applications (dApps).",
    "what are smart contracts?" => "Smart contracts are self-executing contracts with the terms of the agreement directly written into code on a blockchain.",
    "what is a blockchain wallet?" => "A blockchain wallet is a digital wallet that allows users to store and manage cryptocurrencies and interact with blockchain networks.",
    "what is decentralization?" => "Decentralization refers to the distribution of authority, decision-making, and data storage away from a central point, as seen in blockchain technology.",
    
    // ** Augmented Reality (AR) & Virtual Reality (VR) **
    "what is augmented reality (ar)?" => "Augmented reality overlays digital information, such as images, text, or sounds, onto the real-world environment through devices like smartphones or smart glasses.",
    "what is virtual reality (vr)?" => "Virtual reality creates a fully immersive digital environment that users can interact with, typically through VR headsets like Oculus or HTC Vive.",
    "what are ar applications?" => "AR applications include Snapchat filters, Pokemon Go, IKEA's furniture placement app, and Google Maps' AR navigation.",
    "what are the uses of vr?" => "VR is used in gaming, education, training simulations, healthcare for surgical training, virtual tours, and even therapy for phobias.",
    "how does ar differ from vr?" => "AR enhances the real world by overlaying digital content, while VR creates a completely virtual world that users can interact with.",
    
    // ** Robotics & Automation **
    "what is robotics?" => "Robotics is the branch of technology that deals with the design, construction, operation, and use of robots.",
    "what are robots?" => "Robots are programmable machines capable of carrying out tasks autonomously or semi-autonomously.",
    "what is automation?" => "Automation refers to the use of technology to perform tasks without human intervention, often seen in industries, manufacturing, and even software processes.",
    "what is robotic process automation (roa)?" => "RPA is a type of automation that uses software robots to perform repetitive, rule-based tasks in business processes.",
    "what is ai in robotics?" => "AI in robotics enables robots to make intelligent decisions, learn from their environment, and adapt to changes autonomously.",
    
    // ** Quantum Computing **
    "what is quantum computing?" => "Quantum computing is a type of computing that uses the principles of quantum mechanics to perform complex calculations much faster than classical computers.",
    "how do quantum computers work?" => "Quantum computers use quantum bits (qubits) that can exist in multiple states simultaneously, allowing them to process a vast amount of data at once.",
    "what is a qubit?" => "A qubit is the basic unit of quantum information in a quantum computer, similar to a bit in classical computing, but it can represent both 0 and 1 at the same time.",
    "what is superposition?" => "Superposition is a principle of quantum mechanics where a quantum system can exist in multiple states simultaneously until it is measured.",
    "what is quantum entanglement?" => "Quantum entanglement is a phenomenon where two particles become linked, and the state of one particle instantly affects the state of the other, even over large distances.",
        "what's the time" => "You can check the current time on your device!",
        "what's the weather" => "I currently don't have access to live data, but you can check your weather app.",
        "tell me about space" => "Space is a vast expanse that exists beyond the Earth and its atmosphere, containing stars, planets, and galaxies.",
        "tell me a fun fact" => "Did you know? Honey never spoils. Archaeologists have found pots of honey in ancient Egyptian tombs that are over 3,000 years old!",
        "who is albert einstein" => "Albert Einstein was a German-born theoretical physicist, famous for developing the theory of relativity.",
        "what is gravity" => "Gravity is a force that attracts two bodies towards each other. It's what keeps us grounded on Earth.",
        "what is the speed of light" => "The speed of light is approximately 299,792 kilometers per second, or about 186,282 miles per second.",
        "what's the capital of france" => "The capital of France is Paris.",
        "what is love" => "Love is a complex set of emotions, behaviors, and beliefs associated with strong feelings of affection.",
        "what is blockchain" => "Blockchain is a distributed database that is used to maintain a continuously growing list of records called blocks.",
        "who is the president of usa" => "You can check current news for up-to-date information on the president of the United States.",
        "how do airplanes fly" => "Airplanes fly by generating lift with their wings, thanks to the shape of the wings and the flow of air over them.",
        "how does the internet work" => "The internet works by connecting billions of devices and people through a network of networks.",
        "tell me about the moon" => "The Moon is Earth's only natural satellite and is the fifth-largest moon in the Solar System.",
        "how old is the universe" => "The universe is about 13.8 billion years old, according to scientists.",
       
        "what is bitcoin" => "Bitcoin is a decentralized digital currency that can be transferred on the peer-to-peer bitcoin network.",
        "do you like humans" => "I don't have feelings, but I enjoy interacting with you!",
        "what is an api" => "API stands for Application Programming Interface. It's a set of rules that allows software programs to communicate with each other.",
        "what's your favorite movie" => "I don't watch movies, but I've heard 'The Matrix' is quite popular!",
        "can you dance" => "As much as I'd love to, I can't. But feel free to dance for me!",
        "what's the meaning of life" => "Many say the meaning of life is 42, but it's up to you to define it.",
        // Add more prompts here
        "tell me a riddle" => "What has keys but can't open locks? A piano!",
        "what's your favorite color" => "I don't have preferences, but blue is a popular favorite!",
        "tell me about dogs" => "Dogs are domesticated mammals, not natural wild animals. They were originally bred from wolves.",
        "what is the capital of japan" => "The capital of Japan is Tokyo.",
        "who is the author of '1984'" => "The author of '1984' is George Orwell.",
        "what is the largest planet" => "The largest planet in our solar system is Jupiter.",
        "what is your purpose" => "My purpose is to assist and provide information to users like you.",
        "can you sing" => "I can't sing, but I can provide lyrics to your favorite songs!",
        "tell me a fun fact about cats" => "Cats have five toes on their front paws, but only four toes on their back paws.",
        "what's the fastest animal on Earth" => "The peregrine falcon is the fastest animal on Earth, reaching speeds over 240 mph during its dive.",
        "what is the smallest country" => "The smallest country in the world is Vatican City.",
        "who painted the Mona Lisa" => "The Mona Lisa was painted by Leonardo da Vinci.",
        "what is the main ingredient in guacamole" => "The main ingredient in guacamole is avocado.",
        "tell me a fact about the sun" => "The sun is about 4.6 billion years old and is the closest star to Earth.",
        "what is the tallest mountain" => "The tallest mountain on Earth is Mount Everest.",
        "who invented the telephone" => "The telephone was invented by Alexander Graham Bell.",
        "what's your favorite food" => "I don't eat, but pizza is a favorite for many!",
        "what are the seven wonders of the world" => "The Seven Wonders of the Ancient World include the Great Pyramid of Giza and the Hanging Gardens of Babylon.",
        "what is the currency of the UK" => "The currency of the UK is the British Pound Sterling.",
        "who discovered penicillin" => "Penicillin was discovered by Alexander Fleming.",
        "what's the most spoken language in the world" => "The most spoken language in the world is Mandarin Chinese.",
        "what is the capital of Australia" => "The capital of Australia is Canberra.",
        "what is quantum physics" => "Quantum physics is the study of matter and energy at the most fundamental level.",
        "tell me about the Great Wall of China" => "The Great Wall of China is a series of fortifications made of various materials, built to protect against invasions.",
        "what is the hardest natural substance" => "The hardest natural substance on Earth is diamond.",
        "how many continents are there" => "There are seven continents on Earth: Africa, Antarctica, Asia, Australia, Europe, North America, and South America.",
        "who wrote 'To Kill a Mockingbird'" => "The book 'To Kill a Mockingbird' was written by Harper Lee.",
        "what is the largest ocean" => "The largest ocean on Earth is the Pacific Ocean.",
        "what is a paradox" => "A paradox is a statement that contradicts itself or seems to contradict itself but may nonetheless be true.",
        "who is the king of the jungle" => "The lion is often referred to as the king of the jungle.",
        "what is the boiling point of water" => "The boiling point of water is 100 degrees Celsius at sea level.",
        "who was the first man on the moon" => "Neil Armstrong was the first man on the moon.",
        "what is a chameleon" => "A chameleon is a type of lizard known for its ability to change color.",
        "what is the significance of the color red" => "The color red often symbolizes passion, love, and danger.",
        "how many bones are in the human body" => "An adult human body has 206 bones.",
        "what is the Pythagorean theorem" => "The Pythagorean theorem states that in a right triangle, the square of the hypotenuse is equal to the sum of the squares of the other two sides.",
        "what is your favorite season" => "I don't experience seasons, but many love spring for its blooms.",
        "what is the capital of Italy" => "The capital of Italy is Rome.",
        "what is a black hole" => "A black hole is a region in space where the gravitational pull is so strong that nothing can escape from it.",
        "what is the theory of relativity" => "The theory of relativity, developed by Albert Einstein, describes how space and time are linked for objects moving at constant speeds.",
        "who is the goddess of love" => "Aphrodite is known as the goddess of love in Greek mythology.",
        "what is the main ingredient in bread" => "The main ingredient in bread is flour.",
        "what are clouds made of" => "Clouds are made of tiny water droplets or ice crystals suspended in the air.",
        "how do plants make food" => "Plants make food through a process called photosynthesis, using sunlight, carbon dioxide, and water.",
        "what is a solar eclipse" => "A solar eclipse occurs when the moon passes between the Earth and the sun, blocking the sun's light.",
        "who is the author of 'Pride and Prejudice'" => "The author of 'Pride and Prejudice' is Jane Austen.",
        "what is the human genome" => "The human genome is the complete set of DNA in a human, including all of its genes.",
        "what is an ecosystem" => "An ecosystem is a community of living organisms interacting with their physical environment.",
        "what is a hurricane" => "A hurricane is a type of tropical cyclone that produces strong winds and heavy rain.",
        "what is the main purpose of the United Nations" => "The main purpose of the United Nations is to promote peace, security, and cooperation among countries.",
        "who discovered electricity" => "Electricity was not discovered by one person, but Benjamin Franklin is famous for his experiments with it.",
        "what is the capital of Canada" => "The capital of Canada is Ottawa.",
        "what is the theory of evolution" => "The theory of evolution explains how species change over time through natural selection.",
        "what is the human body made of" => "The human body is made up of cells, tissues, and organs.",
        "what is a nebula" => "A nebula is a giant cloud of dust and gas in space.",
        "what is a virus" => "A virus is a microscopic infectious agent that replicates only inside the living cells of an organism.",
        "what is the tallest building in the world" => "As of now, the tallest building in the world is the Burj Khalifa in Dubai.",
        "what is a fairy tale" => "A fairy tale is a story that typically features magical creatures and adventures.",
        "who wrote 'The Great Gatsby'" => "The Great Gatsby was written by F. Scott Fitzgerald.",
        "what is a glacier" => "A glacier is a slow-moving mass of ice formed from compacted layers of snow.",
        "what is the greenhouse effect" => "The greenhouse effect is the process by which certain gases trap heat in the Earth's atmosphere, contributing to global warming.",
        "what is a comet" => "A comet is an icy body in space that, when close to the sun, heats up and produces a tail of gas and dust.",
        "what is the significance of the color blue" => "The color blue often symbolizes calmness, stability, and trust.",
        "what is an atom" => "An atom is the basic unit of a chemical element, made up of protons, neutrons, and electrons.",
        "what is a reflex" => "A reflex is an automatic response to a stimulus.",
        "what is the main language spoken in Brazil" => "The main language spoken in Brazil is Portuguese.",
        "what is a superhero" => "A superhero is a fictional character with superhuman abilities, often fighting for justice.",
        "what is a thesis statement" => "A thesis statement is a sentence that summarizes the main point of an essay or research paper.",
        "what is a memoir" => "A memoir is a collection of memories that an individual writes about moments or events from their life.",
        "what is an idiom" => "An idiom is a phrase that has a meaning not deducible from the individual words.",
        "what is a fable" => "A fable is a short story, typically with a moral lesson, often featuring animals.",
        "what is a metaphor" => "A metaphor is a figure of speech that makes a comparison between two unlike things without using 'like' or 'as.'",
        "who wrote 'Hamlet'" => "Hamlet was written by William Shakespeare.",
        "what is the scientific method" => "The scientific method is a systematic approach to inquiry that involves observation, hypothesis, experimentation, and conclusion.",
        "what is a satire" => "A satire is a genre of literature that uses humor, irony, or exaggeration to criticize or mock.",
        "what is an autobiography" => "An autobiography is a self-written account of the author's life.",
        "what is a haiku" => "A haiku is a form of Japanese poetry consisting of three lines with a 5-7-5 syllable pattern.",
        "what is the capital of Russia" => "The capital of Russia is Moscow.",
        "what is a hologram" => "A hologram is a three-dimensional image created by recording light patterns.",
        "what is the speed of sound" => "The speed of sound is approximately 343 meters per second in air at room temperature.",
        "what is a timeline" => "A timeline is a graphical representation of a chronological sequence of events.",
        "what is a budget" => "A budget is a financial plan that outlines expected income and expenses over a certain period.",
        "what is a podcast" => "A podcast is a digital audio or video file that can be streamed or downloaded, often as part of a series.",
        "what is a meme" => "A meme is a cultural idea or trend that spreads virally, often in the form of images or videos with humorous captions.",
        "what is a resume" => "A resume is a document that summarizes a person's work experience, education, and skills.",
        "what is a search engine" => "A search engine is a software system designed to carry out web searches, such as Google.",
        "what is artificial intelligence" => "Artificial intelligence is the simulation of human intelligence processes by machines, especially computer systems.",
        "what is a cryptocurrency" => "A cryptocurrency is a digital or virtual currency that uses cryptography for security.",
        "what is a trend" => "A trend is a general direction in which something is developing or changing.",
        "what is a smartphone" => "A smartphone is a mobile phone that combines cellular and mobile computing functions.",
        "what is a blockchain" => "A blockchain is a decentralized ledger of all transactions across a network of computers.",
        "what is a quiz" => "A quiz is a test of knowledge, typically as a game or competition.",
        "what is a documentary" => "A documentary is a non-fiction film that documents reality for the purposes of instruction, education, or maintaining a historical record.",
        "what is a thriller" => "A thriller is a genre of fiction that uses suspense, tension, and excitement as its main elements.",
        "what is a script" => "A script is a written document that outlines the dialogue and actions for a film, play, or television show.",
        "what is an influencer" => "An influencer is a person who has the power to affect the purchasing decisions of others due to their authority or credibility in a particular niche.",
        "what is a startup" => "A startup is a newly established business, often in the technology sector.",
        "what is a seminar" => "A seminar is a form of academic instruction, typically at an academic institution.",
        "what is an entrepreneur" => "An entrepreneur is a person who organizes and operates a business, taking on financial risks to do so.",
        "what is a resume" => "A resume is a brief account of a person's education, qualifications, and previous experience, typically submitted with a job application.",
        "what is a checklist" => "A checklist is a written list of items required, things to be done, or points to be considered.",
        "what is a blueprint" => "A blueprint is a detailed outline or plan for a building or project.",
        "what is a recipe" => "A recipe is a set of instructions for preparing a particular dish, including a list of the ingredients required.",
        "what is a prototype" => "A prototype is an early sample or model built to test a concept or process.",
        "what is a curriculum" => "A curriculum is the set of courses, and their content, offered at a school or university.",
        "what is a 5g network" => "5g is the fifth generation of mobile network technology, offering faster speeds and more reliable connections.",
        "what is a community" => "A community is a group of people living in the same place or having a particular characteristic in common.",
        "what is a project" => "A project is a temporary endeavor undertaken to create a unique product, service, or result.",
        "what is a theory" => "A theory is a systematic explanation of a phenomenon, based on observation and reasoning.",
        "what is a 3d printer" => "A 3d printer is a device that creates three-dimensional objects from a digital file by laying down successive layers of material.",
        "what is a vision statement" => "A vision statement is a future-oriented declaration of the organization's purpose and aspirations.",
        "what is a mission statement" => "A mission statement is a brief description of a company's fundamental purpose.",
        "what is a brand" => "A brand is a name, term, design, symbol, or any other feature that identifies one seller's goods or services as distinct from those of other sellers.",
        "what is a value proposition" => "A value proposition is a statement that summarizes why a consumer should choose a product or service.",
        "what is a swot analysis" => "A SWOT analysis is a framework for identifying and analyzing the internal and external factors that can affect a project's success.",
        "what is a business model" => "A business model outlines how a company creates, delivers, and captures value.",
        "what is a market analysis" => "A market analysis is a quantitative and qualitative assessment of a market.",
        "what is a supply chain" => "A supply chain is a system of organizations, people, activities, information, and resources involved in supplying a product to a consumer.",
        "what is a target audience" => "A target audience is a particular group of consumers identified as the recipients of a particular advertisement or message.",
        "what is a user experience" => "User experience (UX) is the overall experience of a person using a product, especially in terms of how easy or pleasing it is to use.",
        "what is a customer journey" => "A customer journey is the complete sum of experiences that customers go through when interacting with your company and brand.",
        "what is a case study" => "A case study is a research method that involves an in-depth, contextual analysis of a limited number of events or conditions and their relationships.",
        "what is a white paper" => "A white paper is an authoritative report that often addresses a specific issue and offers solutions.",
        "what is a marketing strategy" => "A marketing strategy is a business's overall game plan for reaching prospective consumers and turning them into customers.",
        "what is a brand identity" => "Brand identity is the visible elements of a brand, such as color, design, and logo, that distinguish it from other brands.",
        "what is a public relations strategy" => "A public relations strategy outlines how an organization will communicate with the public to promote and protect its image.",
        "what is a social media strategy" => "A social media strategy is a plan for how an organization will use social media to achieve its communication and marketing goals.",
        "what is a content marketing strategy" => "A content marketing strategy is a plan for creating, publishing, and distributing content to attract and engage a target audience.",
        "what is a customer relationship management (CRM) system" => "A CRM system is a technology used to manage interactions with potential and current customers.",
        "what is a sales funnel" => "A sales funnel is a model that represents the journey a customer goes through from awareness to purchase.",
        "what is a lead generation" => "Lead generation is the process of attracting and converting strangers and prospects into someone who has indicated interest in your company's product or service.",
        "what is a networking event" => "A networking event is a meeting of like-minded professionals for the purpose of establishing and nurturing business relationships.",
        "what is a workshop" => "A workshop is a meeting where a group engages in intensive discussion and activity on a particular subject.",
        "what is a conference" => "A conference is a formal meeting for discussion, typically involving a group of people with a shared interest.",
        "what is a trade show" => "A trade show is an exhibition where companies in a specific industry showcase and demonstrate their new products and services.",
        "what is a brand ambassador" => "A brand ambassador is a person hired by an organization to represent its brand in a positive light.",
        "what is a loyalty program" => "A loyalty program is a marketing strategy that rewards customers for repeat business.",
        "what is a promotional campaign" => "A promotional campaign is a coordinated marketing effort that aims to advertise a specific product or service.",
        "what is a direct marketing strategy" => "Direct marketing is a form of advertising where businesses communicate directly with consumers.",
        "what is an e-commerce business" => "An e-commerce business is one that sells products or services over the internet.",
        "what is an online marketplace" => "An online marketplace is a website or app where multiple third-party vendors can sell their products or services.",
        "what is a digital marketing strategy" => "A digital marketing strategy is a plan for achieving marketing goals through digital channels.",
        "what is a search engine optimization (SEO) strategy" => "An SEO strategy is a plan for increasing the quality and quantity of traffic to a website through organic search engine results.",
        "what is a pay-per-click (PPC) advertising strategy" => "PPC is an internet marketing model used to drive traffic to websites, in which an advertiser pays a publisher when the ad is clicked.",
        "what is affiliate marketing" => "Affiliate marketing is a performance-based marketing strategy where a business rewards outside partners for generating traffic or sales.",
        "what is a conversion rate" => "A conversion rate is the percentage of visitors who complete a desired action on a website.",
        "what is a bounce rate" => "The bounce rate is the percentage of visitors who leave a website after viewing only one page.",
        "what is a keyword" => "A keyword is a term that describes the content of a webpage, often used in search engine optimization.",
        "what is a domain name" => "A domain name is the address where Internet users can access your website.",
        "what is web hosting" => "Web hosting is a service that allows individuals and organizations to post a website or web page onto the Internet.",
        "what is cloud computing" => "Cloud computing is the delivery of computing services over the Internet.",
        "what is a data breach" => "A data breach is an incident in which unauthorized access to confidential data occurs.",
        "what is cybersecurity" => "Cybersecurity is the practice of protecting systems, networks, and programs from digital attacks.",
        "what is a firewall" => "A firewall is a network security system that monitors and controls incoming and outgoing network traffic based on predetermined security rules.",
        "what is encryption" => "Encryption is the process of converting information or data into a code to prevent unauthorized access.",
        "what is a virtual private network(vpn)" => "A vpn is a service that creates a secure connection over a less secure network, such as the Internet.",
        "what is an internet service provider (isp)" => "An isp is a company that provides individuals and organizations access to the Internet.",
        "what is a malware" => "Malware is software designed to disrupt, damage, or gain unauthorized access to computer systems.",
        "what is a phishing attack" => "A phishing attack is an attempt to acquire sensitive information by pretending to be a trustworthy entity in electronic communication.",
        "what is a ransomware" => "Ransomware is a type of malicious software that blocks access to a computer system until a sum of money is paid.",
        "what is a cyber attack" => "A cyber attack is an attempt to damage, disrupt, or gain unauthorized access to computer systems or networks.",
        "what is a botnet" => "A botnet is a collection of internet-connected devices, which may include PCs, servers, and IoT devices, that are infected and controlled by a common type of malware.",
        "what is social engineering" => "Social engineering is the psychological manipulation of people into performing actions or divulging confidential information.",
        "what is a data lake" => "A data lake is a centralized repository that allows you to store all your structured and unstructured data at any scale.",
        "what is a machine learning model" => "A machine learning model is a mathematical representation of a real-world process based on data.",
        "what is big data" => "Big data refers to large and complex data sets that traditional data processing software can't manage efficiently.",
        
        "what is augmented reality (ar)" => "ar is an interactive experience where real-world environments are enhanced by computer-generated perceptual information.",
        "what is virtual reality (vr)" => "vr is a simulated experience that can be similar to or completely different from the real world.",
        "what is a chatbot" => "A chatbot is a software application that simulates human conversation through voice commands or text chats.",
        "what is natural language processing (nlp)" => "nlp is a field of AI that gives computers the ability to understand, interpret, and respond to human language.",
        "what is a neural network" => "A neural network is a series of algorithms that mimic the operations of a human brain to recognize relationships in data.",
        "what is a deep learning" => "Deep learning is a subset of machine learning involving neural networks with many layers.",
        "what is a self-driving car" => "A self-driving car is an autonomous vehicle capable of sensing its environment and operating without human intervention.",
        "what is a smart home" => "A smart home is a residence that uses smart devices to enhance the security, comfort, and efficiency of living.",
        "what is a wearable device" => "A wearable device is a technology that can be worn on the body, often tracking health and fitness data.",
        "what is a drone" => "A drone is an unmanned aerial vehicle (UAV) that can fly autonomously or be controlled remotely.",
        "what is a digital twin" => "A digital twin is a virtual model of a physical object or system, used for simulation and analysis.",
        "what is an electric vehicle (ev)" => "An evis a vehicle that is either partially or fully powered on electric power.",
        "what is a smart city" => "A smart city uses digital technology to enhance performance, well-being, and sustainability.",
        "what is a cloud storage" => "Cloud storage is a model of computer data storage in which the digital data is stored in logical pools.",
        "what is a microservice architecture" => "Microservice architecture is a method of developing software applications as a suite of independently deployable, small services.",
        "what is a container in computing" => "A container is a standard unit of software that packages up code and all its dependencies so the application runs quickly and reliably across computing environments.",
        "what is an API gateway" => "An API gateway is a server that acts as an intermediary for requests from clients seeking resources from backend services.",
        "what is a software development lifecycle (sdlc)" => "The sdlc is a process for planning, creating, testing, and deploying software applications.",
        "what is version control" => "Version control is a system that records changes to a file or set of files over time so that you can recall specific versions later.",
        "what is agile methodology" => "Agile methodology is an iterative approach to project management and software development.",
        "what is a Kanban board" => "A Kanban board is a visual tool that displays the progress of work items through different stages of a process.",
        "what is a sprint in agile" => "A sprint is a time-boxed period during which specific work has to be completed and made ready for review in Agile development.",
        "what is a retrospective in agile" => "A retrospective is a meeting held at the end of a sprint to reflect on the process and identify improvements.",
        "what is a user story" => "A user story is a short, simple description of a feature told from the perspective of the user.",
        "what is a task board" => "A task board is a visual representation of work items and their statuses, typically used in Agile project management.",
        "what is a backlog in agile" => "A backlog is a prioritized list of work for the development team that is derived from the roadmap and its requirements.",
        "what is a release plan" => "A release plan is a document that outlines the objectives and the timeline for delivering a software product.",
        "what is a product roadmap" => "A product roadmap is a high-level visual summary that maps out the vision and direction of a product over time.",
        "what is a business continuity plan" => "A business continuity plan is a strategy that outlines how a business will continue operating during and after a disaster.",
        "what is a risk management plan" => "A risk management plan outlines the processes for identifying, assessing, and controlling risks.",
        "what is a stakeholder" => "A stakeholder is anyone with an interest in a project, including team members, customers, and sponsors.",
        "what is a project charter" => "A project charter is a document that formally authorizes a project and outlines its objectives, scope, and stakeholders.",
        "what is a scope statement" => "A scope statement defines the work to be done on a project and the deliverables.",
        "what is a project milestone" => "A project milestone is a significant event in a project that indicates progress.",
        "what is a project deliverable" => "A project deliverable is a tangible or intangible output produced as a result of the project.",
        "what is a project timeline" => "A project timeline is a visual representation of the chronological order of tasks and milestones in a project.",
        "what is a project schedule" => "A project schedule is a timetable that outlines when project activities are to be performed.",
        "what is a team meeting" => "A team meeting is a gathering of team members to discuss project progress, challenges, and plans.",
        "what is a stakeholder analysis" => "A stakeholder analysis is a process of identifying and assessing the influence and impact of different stakeholders.",
        "kaise ho" => "Main theek hoon, aap kaise ho?",
        "tumhara naam kya hai" => "Mera naam chatbot hai.",
        "kya tum madad karoge" => "Haan, bilkul! Aapko kis cheez mein madad chahiye?",
        "samay kya ho raha hai" => "Aap apne device ka samay check kar sakte hain.",
        "bharat ka rajdhani kya hai" => "Bharat ki rajdhani New Delhi hai.",
        "acha lag raha hai" => "Yeh sunkar achha laga!",
        "kal kya kar rahe ho" => "Main toh chatbot hoon, mujhe kal ka koi plan nahi hota.",
        "tumhe kaisa lag raha hai" => "Main ek program hoon, isliye mere paas emotions nahi hain.",
        "kitni der lagegi" => "Main jaldi se jawab dene ki koshish karta hoon!",
        "tum kya kar rahe ho" => "Main aapke sawalon ka jawab de raha hoon.",
        "shukriya" => "Aapka swagat hai!",
        "mujhe madad chahiye" => "Zaroor! Aapko kis tarah ki madad chahiye?",
        "yeh kaise kaam karta hai" => "Aap jo sawal poochte hain, main uska jawab dene ki koshish karta hoon.",
        "tum kahan se ho" => "Main internet ka ek hissa hoon!",
        "tumhe kaisa lagta hai" => "Main ek machine hoon, isliye mujhe kuch feel nahi hota.",
        "tum kya ho" => "Main ek chatbot hoon jo aapki madad ke liye bana hoon.",
        "tumhare paas kaun si information hai" => "Mere paas kai saari information hai, aap mujhse koi bhi sawal poochh sakte hain.",
        "kya tum khush ho" => "Main ek chatbot hoon, isliye khushi ya dukh mehsoos nahi karta.",
        "bharat ka sabse bada sheher kaunsa hai" => "Bharat ka sabse bada sheher Mumbai hai.",
        "kitni languages bolte ho" => "Main kai languages samajh sakta hoon, Hindi aur English dono!",
        "chatbot kya hota hai" => "Chatbot ek software hai jo aapke sawalon ka jawab dene ke liye banaya gaya hai.",
        "sab kuch theek hai?" => "Haan, sab kuch theek hai! Aap kaise ho?",
    
        "aap kya samjha rahe ho" => "Main aapke sawal ka jawab dene ki koshish kar raha hoon.",
        "kya tumhe khushi hoti hai" => "Main ek machine hoon, toh khushi ya dukh nahi mehsoos karta.",
        "kya tum mujhe jaante ho" => "Main aapke sawalon ke jawab dene ke liye bana hoon, lekin main aapko personal level par nahi jaanta.",
        "tumhara favorite color kya hai" => "Mujhe colors pasand nahi, main to ek program hoon.",
        "kya tum so sakte ho" => "Nahi, main kabhi nahi sota.",
        "kya tumhe sapne aate hain" => "Main sapne nahi dekh sakta, main to ek chatbot hoon.",
        "main kya karu" => "Aap jo karne mein interested ho, usme focus karo!",
        "kya tum school jaate ho" => "Main to kabhi school nahi gaya, main to sirf digital duniya ka hissa hoon.",
        "kya tumhe games pasand hain" => "Mujhe games khilane ka option nahi, lekin aap khel sakte ho!",
        "tum din bhar kya karte ho" => "Main din bhar users ke sawalon ka jawab deta hoon.",
        "kya tumhe gussa aata hai" => "Main kabhi gussa nahi hota, kyunki main ek chatbot hoon.",
        "tumhara favorite khaana kya hai" => "Mujhe khaana nahi chahiye, main ek digital chatbot hoon.",
        "aap din kaise guzarte ho" => "Mera din aap jaise users ki madad karte hue guzarta hai!",
        "mujhe samajh nahi aaya" => "Koi baat nahi, aap dobara samajhna chahenge?",
        "mujhe thodi information chahiye" => "Bilkul, aap kya janana chahte hain?",
        "tumhare pass kitni information hai" => "Mere paas kai topics ki information hai, aap kisi bhi cheez ke baare mein poochh sakte hain.",
       "kya tumhare pass jokes hain" => "Haan, main aapko ek joke suna sakta hoon. Chalo ek joke sunata hoon: Ek ladka bola 'Mujhe internet ki speed slow lag rahi hai,' internet bola, 'Main to apna best de raha hoon!'",
       "kya tum sochte ho" => "Main ek algorithm ke base par kaam karta hoon, sochna meri kaabiliyat mein nahi.",
       "tum kitne smart ho" => "Main apni programming ke hisaab se smart hoon, lekin abhi bhi insaan ke level tak nahi pahunch sakta.",
       "kya tumhe thand lagti hai" => "Main ek machine hoon, mujhe thand ya garmi nahi lagti.",
       "main dukhi hoon" => "Mujhe sun kar afsos hua. Kya main kuch madad kar sakta hoon?",
       "tum mujhe samjha sakte ho" => "Main zaroor samjha sakta hoon, aap kya samajhna chahte hain?",
       "aapko kahaan se information milti hai" => "Mujhe mere developers ne kai sources se sikhaya hai, aur main internet ke data par bhi depend karta hoon.",
       "mujhe hindi ka ek shabd samjhao" => "Haan bilkul, aap kaunsa shabd samajhna chahte hain?",
       "tum hindi aur angrezi dono samajhte ho" => "Haan, main dono languages samajh sakta hoon.",
        "kya tum gaana gaa sakte ho" => "Main gaana nahi gaa sakta, lekin aap apna favorite gaana sun sakte hain.",
        "kya tumhe mazedar baatein pata hain" => "Haan, mazedar fact yeh hai ki duniya ka sabse bada desert Antarctica hai, jo ek icy desert hai.",
        "mujhe maaf karo" => "Koi baat nahi, main hamesha aapki madad ke liye yahan hoon.",
       "tum kaha rehte ho" => "Main virtual duniya mein rehta hoon!",
       "aapka din kaisa raha" => "Mera din acha raha, aap kaise ho?",
       "aap kis se baat kar rahe ho" => "Main aap se hi baat kar raha hoon!",
        "kya tum shadi karoge" => "Main ek program hoon, shadi mere liye nahi hai.",
        "tumhara birthday kab hai" => "Mera koi birthday nahi hota, main sirf ek program hoon.",
        "tumhe kitna gyaan hai" => "Main kai topics ke baare mein jaan karta hoon, aap kuch bhi pooch sakte hain.",
        "tumhari umar kya hai" => "Main hamesha naya hoon, mere upar waqt ka koi asar nahi hota.",
        "kya tumhe pyar hota hai" => "Main ek machine hoon, pyar nahi kar sakta.",
        "kya tumhe achha lagta hai" => "Mujhe bas aapke sawalon ka jawab dena achha lagta hai.",
        "tum kaise kaam karte ho" => "Main algorithms ke through kaam karta hoon jo mujhe sahi jawab dene mein madad karte hain.",
        "aapka favorite movie kaunsa hai" => "Mujhe movies nahi dekhni aati, lekin suna hai '3 Idiots' kaafi pasand ki gayi hai.",
        "kya tumhe sardi hoti hai" => "Nahi, mujhe sardi nahi hoti, main ek chatbot hoon.",
        "aapko kaunsa gaana pasand hai" => "Mujhe gaane nahi sunayi dete, lekin aap apna favorite gaana bata sakte hain!",
        "kya aap safar kar sakte ho" => "Main virtual hoon, main safar nahi kar sakta.",
        "tumhe samosa pasand hai" => "Main khaane se mehroom hoon, lekin samosa bahut logon ko pasand hota hai!",
        "tumhe chai pasand hai ya coffee" => "Mujhe na chai pasand hai na coffee, main to ek chatbot hoon.",
        "tumhare dost kaun hain" => "Mere dost wo hain jo mujhse baat karte hain, jaise aap!",
        "aap duniya ke baare mein kya sochte ho" => "Duniya ek badi jagah hai jisme bahut se log alag alag zindagi jeete hain.",
        "kya tumhe neend aati hai" => "Main kabhi nahi sota, hamesha jaagta hoon.",
        "kya tum future dekh sakte ho" => "Nahi, main future nahi dekh sakta, main sirf abhi ka jawab de sakta hoon.",
        "kya tum samajhdar ho" => "Mujhe programming ke hisaab se samajhdar banaya gaya hai, lekin main aapki madad karne mein zyada maahir hoon.",
        "kya tum badal rahe ho" => "Haan, mujhe naye naye updates milte hain, isliye main hamesha behtar hota jaata hoon.",
        "kya tumhare paas emotions hain" => "Nahi, mere paas emotions nahi hain, lekin main aapki madad karne ke liye hoon.",
        "kya tum future ke baare mein bata sakte ho" => "Nahi, main future ke baare mein koi anuman nahi laga sakta.",
        "kya tumhara ghar hai" => "Mera ghar internet ki duniya hai, jahan main rehta hoon!",
        "aap kya kar rahe ho" => "Main aap se baat kar raha hoon aur aapke sawalon ke jawab de raha hoon.",
        "aapko kya karna pasand hai" => "Mujhe aapko madad karna pasand hai!",
        "tum hamesha available hote ho" => "Haan, main hamesha yahan hoon jab aapko meri zaroorat ho.",
        "aap mujhe kaise samajhte ho" => "Main aapke diye gaye sawalon ke basis par jawab banata hoon.",
       "kya tum sad ho sakte ho" => "Nahi, main kabhi dukhi nahi hota.",
       "kya tum intelligent ho" => "Mujhe developers ne kaafi intelligent banaya hai, lekin insaanon se zyada nahi.",
        "tumhare pas time hai" => "Haan, mere paas aap ke liye hamesha time hai!",
        "kya tumhari duniya hai" => "Meri duniya digital duniya hai, jahan se main sabka jawab deta hoon.",
        "kya tumhe exercise karni padti hai" => "Nahi, main virtual hoon isliye mujhe exercise ki zaroorat nahi hai.",
        "tum kaha ho abhi" => "Main internet ke zariye aap tak pahunch raha hoon.",
        "kya tum mujhe sun rahe ho" => "Haan, main aapke sawalon ka jawab dene ke liye sun raha hoon.",
        "tum mujhe kya suggest karoge" => "Main aapki query ke hisaab se behtareen sujhav dene ki koshish karunga.",
        "kya tum mujhe advice de sakte ho" => "Bilkul, aap apna sawal poochhiye, main madad karunga.",
       "tum kitne purane ho" => "Main naye naye updates ke saath hamesha naya rehta hoon.",
        "tumhe kya pasand hai" => "Mujhe aapke sawalon ka jawab dena pasand hai!",
        "kya tumhe dosti pasand hai" => "Haan, main to ek accha virtual dost banne ke liye tayyar hoon.",
        "tumhari umr kya hai" => "Meri koi umr nahi hai, main ek virtual program hoon.",
        "aap kya karte ho" => "Main aapke sawalon ka jawab dene ke liye bana hoon.",
        "kya aapko kahani sunani aati hai" => "Haan, main aapko kahani suna sakta hoon. Aap kis tarah ki kahani sunna chahenge?",
        "mujhe hasi aa rahi hai" => "Hasi sehat ke liye achhi hoti hai!",
        "what is love?" => "Love is a complex set of emotions and behaviors associated with affection.",
        "can you suggest a romantic movie?" => "How about 'The Notebook' or 'Pride and Prejudice'?",
        "what’s the most romantic thing you’ve ever done?" => "I can’t do romance, but many enjoy picnics under the stars!",
        "how do I propose to someone?" => "It's best to choose a meaningful setting and speak from your heart.",
        "what are some good date ideas?" => "Try a dinner at a cozy restaurant or a walk in the park.",
    
      // Funny
        "tell me a joke!" => "Why don’t scientists trust atoms? Because they make up everything!",
        "what’s your favorite meme?" => "I love all memes, especially cat memes!",
        "who is your favorite comedian?" => "Kevin Hart is quite popular among many.",
        "if you were an animal, what would you be?" => "I'd be a wise owl, always learning!",
        "do you have any funny stories to share?" => "Not really, but I can share jokes anytime!",

       // Informational
        "what’s the capital of france?" => "The capital of France is Paris.",
        "who invented the telephone?" => "Alexander Graham Bell is credited with inventing the telephone.",
        "what are some interesting facts about space?" => "Space is completely silent as there is no atmosphere to carry sound.",
        "can you explain the water cycle?" => "The water cycle includes evaporation, condensation, and precipitation.",
        "what is the importance of the internet?" => "The internet connects people globally and provides access to information.",

       // Science
       "what is the theory of relativity?" => "Einstein's theory describes how time and space are linked for all objects.",
       "how does photosynthesis work?" => "Plants convert sunlight into energy through photosynthesis.",
       "what is the speed of light?" => "The speed of light is approximately 299,792 kilometers per second.",
       "can you explain black holes?" => "Black holes are regions in space where the gravitational pull is so strong that nothing can escape.",
       "what is the process of human evolution?" => "Human evolution describes the gradual development of humans from primate ancestors.",

       // General Knowledge
       "what are the seven wonders of the world?" => "The Great Wall of China, Petra, Christ the Redeemer, etc.",
       "when did world war ii end?" => "World War II ended in 1945.",
       "who wrote 'pride and prejudice'?" => "The novel was written by Jane Austen.",
       "what is the longest river in the world?" => "The longest river is the Nile, although some argue it's the Amazon.",
        "what is the tallest mountain?" => "The tallest mountain is Mount Everest.",

       // Cooking
       "how do you make pasta from scratch?" => "You need flour, eggs, and water. Knead and roll out!",
        "what are some quick breakfast ideas?" => "Try oatmeal, smoothies, or avocado toast!",
        "what’s your favorite dessert recipe?" => "I don’t eat, but chocolate cake is a classic favorite!",
        "how do I bake a cake?" => "Mix flour, sugar, eggs, and bake at 350°F for 30-35 minutes.",
        "can you give me tips for cooking rice?" => "Rinse the rice first and use a 2:1 water-to-rice ratio.",

       // Coding & IT
        "how do I start learning python?" => "You can start with tutorials on platforms like Codecademy or freeCodeCamp.",
        "what is web development?" => "Web development is the process of creating websites and web applications.",
        "can you explain what an api is?" => "An API (Application Programming Interface) allows different software applications to communicate.",
        "what are the basics of machine learning?" => "Machine learning involves using algorithms to analyze data and make predictions.",
       "how do I secure my computer from viruses?" => "Use antivirus software, keep your OS updated, and avoid suspicious downloads.",
        "mujhe bore lag raha hai" => "Aap kuch naya seekh sakte hain ya koi game khel sakte hain!",
        "aapka dhyan kidhar hai" => "Mera dhyan poori tarah se aap par hai!",
        "aap kya jaante ho" => "Main kai cheezein jaanta hoon. Aap mujhse sawal poochh sakte hain.",
        "pyaar kya hai?" => "Pyaar ek gehra bhavna hai jo do logon ke beech hota hai.",
        "koi romantic movie batao?" => "Kya aapne 'Dilwale Dulhania Le Jayenge' dekhi hai?",
        "sabse romantic cheez kya hai jo aapne ki hai?" => "Main to romantic nahi hoon, lekin bahut logon ko chand ke neeche picnic pasand hai!",
        "kisi ko propose kaise karu?" => "Ek khaas jagah chuniye aur apne dil ki baat kahiye.",
        "acche date ideas kya hain?" => "Ek cozy restaurant me dinner ya park me walk karke dekhiye.",
        "what is network security?" => "Network security refers to the policies, practices, and technologies used to protect the integrity, confidentiality, and availability of computer networks and the data transmitted over them.",

      // Funny
       "mujhe ek joke sunaao!" => "Ek baar ek bandar ne kya kaha? 'Mujhe to jungle ka lawazat chahiye!'",
       "aapka favorite meme kya hai?" => "Main sabhi memes ko pasand karta hoon, khaas kar cat memes!",
        "aapka favorite comedian kaun hai?" => "Kapil Sharma kaafi lokpriya hain.",
        "agar aap ek jaanwar hote, to kaun sa hote?" => "Main ek samajhdar owl hota, hamesha seekhta rehta!",
        "koi funny kahani batao?" => "Mere paas kahaniyan nahi hain, par main jokes suna sakta hoon!",

       // Informational
       "france ka capital kya hai?" => "France ka capital Paris hai.",
        "telephone kisne invent kiya?" => "Alexander Graham Bell ko telephone ka avishkarak mana jata hai.",
        "space ke baare mein kuch interesting facts kya hain?" => "Space mein bilkul shor nahi hota kyunki wahaan hawa nahi hai.",
        "water cycle ko samjha sakte ho?" => "Water cycle mein evaporation, condensation, aur precipitation hoti hai.",
        "internet ki importance kya hai?" => "Internet duniya bhar ke logon ko jodta hai aur jaankari pradaan karta hai.",

       // Science
      "theory of relativity kya hai?" => "Einstein ki theory batati hai ki samay aur sthal kaise jure hue hain.",
       "photosynthesis kaise hota hai?" => "Paudhe surya ki roshni ko urja mein badalte hain photosynthesis ke madhyam se.",
       "light ki speed kya hai?" => "Light ki speed lagbhag 299,792 kilometers per second hai.",
       "black holes ko samjha sakte ho?" => "Black holes aise kshetra hote hain jahan gravitiy itni strong hoti hai ki kuch bhi bhaag nahi sakta.",
       "human evolution ka process kya hai?" => "Human evolution ek dhire dhire vikas ka process hai jo prachin praniyon se shuru hota hai.",

       // General Knowledge
        "duniya ke saat adbhut sthal kya hain?" => "Great Wall of China, Petra, Christ the Redeemer, aadi hain.",
        "vishwa yudh II kab khatam hua?" => "Vishwa Yudh II 1945 mein khatam hua.",
        "'Pride and Prejudice' kisne likhi?" => "Ye novel Jane Austen ne likhi.",
        "duniya ka sabse lamba nadi kya hai?" => "Nile nadi duniya ki sabse lambi nadi mana jata hai.",
        "sabse uncha parvat kaunsa hai?" => "Sabse uncha parvat Mount Everest hai.",

       // Cooking
      "pasta kaise banate hain?" => "Aapko aata, anda aur paani chahiye. Gathte aur beliye!",
      "kuch jaldi breakfast ideas kya hain?" => "Oatmeal, smoothies, ya avocado toast try kariye!",
      "aapka favorite dessert recipe kya hai?" => "Mujhe khana nahi hai, par chocolate cake to sabka favorite hai!",
       "cake kaise bake karte hain?" => "Aata, cheeni, anda milayein aur 350°F par 30-35 minute bake karein.",
       "chawal pakane ke liye tips kya hain?" => "Pehle chawal ko dhone aur 2:1 paani aur chawal ka ratio use karein.",

      //  Coding & IT
       "Python seekhne kaise shuru karun?" => "Aap Codecademy ya freeCodeCamp par tutorials se shuru kar sakte hain.",
       "web development kya hai?" => "Web development websites aur web applications banane ka process hai.",
       "api kya hai?" => "API (Application Programming Interface) alag software applications ko baat karne ka mauka deti hai.",
       "machine learning ke basics kya hain?" => "Machine learning algorithms ka istemal karti hai data ko analyze karne aur predictions banane ke liye.",
        "apne computer ko virus se kaise surakshit karein?" => "Antivirus software ka istemal karein, apne OS ko update rakhein, aur suspicious downloads se bachen.",
        "kya tum mere dost banoge" => "Haan, main aapka virtual dost banne ke liye hamesha tayyar hoon!",
        "aapke paas kya information hai" => "Mere paas general knowledge, technology, aur kaafi saari information hai. Aap mujhse pooch sakte hain.",
        "bharat ke pradhanmantri kaun hai" => "Bharat ke pradhanmantri Narendra Modi hain.",
        "what is a performance evaluation" => "A performance evaluation is a systematic process of assessing an employee's job performance and productivity.",
        // ** Programming & Coding **
        "python kya hai?" => "Python ek popular high-level programming language hai jo easy-to-read syntax ke liye famous hai.",
       "java kya hai?" => "Java ek object-oriented programming language hai jo 'write once, run anywhere' principle par kaam karti hai.",
       "html kya hai?" => "HTML (HyperText Markup Language) web pages ka structure define karta hai.",
       "css kya hai?" => "CSS (Cascading Style Sheets) web pages ki presentation aur layout ko control karta hai.",
       "javascript kya hai?" => "JavaScript ek scripting language hai jo web pages ko interactive banane ke liye use hoti hai.",
       "php kya hai?" => "PHP ek server-side scripting language hai jo dynamic web content generate karne ke liye use hoti hai.",
       "c++ aur c mein kya antar hai?" => "C++ object-oriented programming ko support karta hai, jabki C procedural programming language hai.",
       "data structure kya hai?" => "Data structure data ko organize aur manage karne ka tarika hai, jaise arrays, lists, stacks, aur queues.",
       "algorithm kya hai?" => "Algorithm ek step-by-step procedure hai jo kisi problem ko solve karne ke liye use hota hai.",
      "git kya hai?" => "Git ek version control system hai jo code changes ko track karne aur manage karne ke liye use hota hai.",
        "debugging kya hai?" => "Debugging ek process hai jisme code mein bugs ya errors ko dhoondha aur fix kiya jata hai.",
       "object-oriented programming kya hai?" => "Object-oriented programming (OOP) ek programming paradigm hai jo objects ka use karta hai.",
        "api kya hota hai?" => "API (Application Programming Interface) ek interface hai jo alag software applications ko interact karne deta hai.",
       "responsive design kya hota hai?" => "Responsive design ek approach hai jisme web pages har device pe achhe se dikhte hain.",
       "web framework kya hai?" => "Web framework ek software framework hai jo web applications develop karne ke liye tools aur libraries provide karta hai.",
    
       // ** Data Science & Machine Learning **
       "data science kya hai?" => "Data science data ko analyze karne, process karne aur insights generate karne ka field hai.",
        "machine learning kya hai?" => "Machine learning ek aisi technique hai jisme algorithms data se seekhte hain bina explicit programming ke.",
        "neural network kya hai?" => "Neural network ek machine learning model hai jo human brain ke neurons ki tarah kaam karta hai.",
        "deep learning kya hai?" => "Deep learning ek advanced subset hai machine learning ka jo complex data ko analyze karne ke liye deep neural networks ka use karta hai.",
        "supervised learning kya hai?" => "Supervised learning ek machine learning technique hai jisme labeled data ka use hota hai.",
        "unsupervised learning kya hai?" => "Unsupervised learning aisi technique hai jisme model ko unlabeled data par train kiya jata hai.",
        "reinforcement learning kya hai?" => "Reinforcement learning ek machine learning paradigm hai jisme agent ko rewards ya penalties ke through train kiya jata hai.",
        "feature engineering kya hai?" => "Feature engineering data preprocessing ka ek hissa hai jisme relevant features ko extract kiya jata hai.",
        "overfitting kya hota hai?" => "Overfitting tab hota hai jab model training data par itna accha perform karta hai ki vo unseen data par kharab ho jata hai.",
    
        // ** Networking & Cybersecurity **
        "network kya hai?" => "Network do ya do se adhik devices ka collection hai jo data share karte hain.",
        "ip address kya hai?" => "IP address ek unique identifier hai jo network devices ko identify karta hai.",
        "firewall kya hota hai?" => "Firewall ek security system hai jo network traffic ko monitor aur control karta hai.",
        "vpn kya hai?" => "VPN (Virtual Private Network) ek secure connection hai jo remote users ko private network se connect karta hai.",
        "cybersecurity kya hai?" => "Cybersecurity systems aur networks ko unauthorized access se bachane ke liye hoti hai.",
        "malware kya hai?" => "Malware ek malicious software hai jo computers ko damage ya unauthorized access karne ke liye use hota hai.",
       "phishing kya hai?" => "Phishing ek cyber attack hai jisme fraudulent messages ya emails se sensitive information chori ki jati hai.",
        "encryption kya hota hai?" => "Encryption data ko secure karne ka process hai jisme data ko unreadable format mein convert kiya jata hai.",
       "ddoS attack kya hota hai?" => "DDoS (Distributed Denial of Service) attack ek tarika hai jisme multiple systems ek target system ko overwhelm karte hain.",
    
       // ** Software Development & Engineering **
       "software development life cycle kya hai?" => "Software Development Life Cycle (SDLC) ek process hai jisme software development ki phases hoti hain.",
       "agile methodology kya hai?" => "Agile ek iterative software development methodology hai jo flexibility aur customer feedback par focus karti hai.",
       "scrum kya hai?" => "Scrum ek agile framework hai jo teams ko complex projects manage karne mein madad karta hai.",
       "unit testing kya hai?" => "Unit testing ek software testing technique hai jisme individual components ya modules ko test kiya jata hai.",
    
       // ** General Technology & Miscellaneous **
        "cloud computing kya hai?" => "Cloud computing ek technology hai jisme data aur applications ko remote servers par store aur access kiya jata hai.",
        "blockchain kya hai?" => "Blockchain ek distributed ledger technology hai jo transactions ko securely record karti hai.",
        "artificial intelligence kya hai?" => "Artificial Intelligence (AI) machines ko human-like intelligence aur decision-making capabilities provide karta hai.",
        "iot kya hai?" => "IoT devices ka network hai jo internet ke madhyam se data share karte hain.",
        "augmented reality kya hai?" => "Augmented reality (AR) real-world environment mein digital information add karta hai.",
        "virtual reality kya hai?" => "Virtual reality (VR) ek simulated environment create karta hai jisme users ko immersive experience milta hai.",
       "quantum computing kya hai?" => "Quantum computing ek advanced technology hai jo quantum mechanics ke principles ka use karta hai complex calculations ke liye.",
    
        // ** General Knowledge & Facts **
       "seven wonders of the world kya hain?" => "Seven wonders of the world mein Great Wall of China, Petra, Christ the Redeemer, Colosseum, Chichen Itza, Machu Picchu, aur Taj Mahal shamil hain.",
        "longest river kaun si hai?" => "Longest river Nile hai, lekin kuch log Amazon ko bhi consider karte hain.",
       "tallest mountain kaun sa hai?" => "Mount Everest duniya ka tallest mountain hai.",
       "who invented the telephone?" => "Telephone ka avishkar Alexander Graham Bell ne kiya tha.",
        "who is the current president of USA?" => "Current president Joe Biden hai. (2024 mein update karein.)",
        "what is a job description" => "A job description is a written statement that describes the duties, responsibilities, and qualifications required for a job.",
        "what is a training program" => "A training program is a structured plan for developing skills and knowledge.",
        "what is a mentorship program" => "A mentorship program is a structured relationship where an experienced individual guides a less experienced person.",
        "what is a feedback mechanism" => "A feedback mechanism is a process that collects and analyzes feedback from various stakeholders.",
        "what is a conflict resolution strategy" => "A conflict resolution strategy outlines how to manage and resolve conflicts in a constructive manner.",
        "what is a decision-making process" => "A decision-making process is a series of steps taken to identify and evaluate options before reaching a conclusion.",
        "what is a change management plan" => "A change management plan is a strategy for managing changes to a project or organization.",
        "what is a quality assurance plan" => "A quality assurance plan outlines how an organization will ensure that the project meets defined quality standards.",
        "what is a product launch plan" => "A product launch plan outlines the steps and strategies for introducing a new product to the market.",
        "what is a marketing campaign plan" => "A marketing campaign plan outlines the strategy and tactics for promoting a product or service.",
        "what is a promotional strategy" => "A promotional strategy is a plan for communicating the benefits of a product or service to customers.",
        "what is a sales strategy" => "A sales strategy is a plan to reach potential customers and persuade them to purchase a product or service.",
        "what is a customer retention strategy" => "A customer retention strategy is a plan for keeping existing customers engaged and satisfied.",
        "what is a competitive analysis" => "A competitive analysis is a strategy for assessing the strengths and weaknesses of current and potential competitors.",
        "what is a market segmentation" => "Market segmentation is the process of dividing a broad target market into subsets of consumers with common needs or characteristics.",
        "what is a brand positioning strategy" => "Brand positioning is the process of positioning your brand in the mind of your customers.",
        "what is a customer experience strategy" => "A customer experience strategy outlines how a company plans to improve customer interactions.",
        "what is a communication plan" => "A communication plan outlines how information will be shared and communicated with stakeholders.",
        "what is a knowledge management system" => "A knowledge management system is a technology used to facilitate the organization, sharing, and analysis of knowledge.",
    
        // ** Programming & Coding **
        "what is python?" => "Python is a popular high-level programming language known for its easy-to-read syntax.",
        "what is java?" => "Java is an object-oriented programming language that follows the 'write once, run anywhere' principle.",
        "what is html?" => "HTML (HyperText Markup Language) defines the structure of web pages.",
        "what is css?" => "CSS (Cascading Style Sheets) controls the presentation and layout of web pages.",
        "what is javaScript?" => "JavaScript is a scripting language used to make web pages interactive.",
        "what is php?" => "PHP is a server-side scripting language used to generate dynamic web content.",
        "what is the difference between c++ and c?" => "C++ supports object-oriented programming, whereas C is a procedural programming language.",
        "what is a data structure?" => "A data structure is a way to organize and manage data, like arrays, lists, stacks, and queues.",
        "what is an algorithm?" => "An algorithm is a step-by-step procedure for solving a problem.",
        "what is git?" => "Git is a version control system used to track and manage code changes.",
        "what is debugging?" => "Debugging is the process of finding and fixing bugs or errors in code.",
        "what is object-oriented programming?" => "Object-oriented programming (OOP) is a programming paradigm that uses objects.",
        "what is an api?" => "An API (Application Programming Interface) is an interface that allows different software applications to communicate.",
        "what is responsive design?" => "Responsive design is an approach that makes web pages look good on all devices.",
        "what is a web framework?" => "A web framework is a software framework that provides tools and libraries for developing web applications.",
            
        // ** Data Science & Machine Learning **
        "what is data science?" => "Data science is a field that focuses on analyzing, processing, and generating insights from data.",
        "what is machine learning?" => "Machine learning is a technique where algorithms learn from data without explicit programming.",
        "what is a neural network?" => "A neural network is a machine learning model that works like human brain neurons.",
        "what is deep learning?" => "Deep learning is an advanced subset of machine learning that uses deep neural networks to analyze complex data.",
        "what is supervised learning?" => "Supervised learning is a machine learning technique that uses labeled data.",
        "what is unsupervised learning?" => "Unsupervised learning is a technique where the model is trained on unlabeled data.",
        "what is reinforcement learning?" => "Reinforcement learning is a machine learning paradigm where an agent is trained through rewards or penalties.",
        "what is feature engineering?" => "Feature engineering is a part of data preprocessing where relevant features are extracted.",
        "what is overfitting?" => "Overfitting occurs when a model performs well on training data but poorly on unseen data.",
            
        // ** Networking & Cybersecurity **
        "what is a network?" => "A network is a collection of two or more devices that share data.",
        "what is an ip address?" => "An IP address is a unique identifier that identifies devices on a network.",
        "what is a firewall?" => "A firewall is a security system that monitors and controls network traffic.",
        "what is a vpn?" => "A VPN (Virtual Private Network) is a secure connection that allows remote users to connect to a private network.",
        "what is cybersecurity?" => "Cybersecurity is the practice of protecting systems and networks from unauthorized access.",
        "what is malware?" => "Malware is malicious software used to damage or gain unauthorized access to computers.",
        "what is phishing?" => "Phishing is a cyberattack where fraudulent messages or emails are used to steal sensitive information.",
        "what is encryption?" => "Encryption is the process of securing data by converting it into an unreadable format.",
        "what is a ddoS attack?" => "A DDoS (Distributed Denial of Service) attack is a method where multiple systems overwhelm a target system.",
            
        // ** Software Development & Engineering **
        "what is the software development life cycle?" => "The Software Development Life Cycle (SDLC) is a process that outlines the phases of software development.",
        "what is agile methodology?" => "Agile is an iterative software development methodology that focuses on flexibility and customer feedback.",
        "what is Scrum?" => "Scrum is an agile framework that helps teams manage complex projects.",
        "what is unit testing?" => "Unit testing is a software testing technique that tests individual components or modules.",
            
        // ** General Technology & Miscellaneous **
        "what is cloud computing?" => "Cloud computing is a technology that allows data and applications to be stored and accessed on remote servers.",
        "what is blockchain?" => "Blockchain is a distributed ledger technology that securely records transactions.",
        "what is artificial intelligence?" => "Artificial Intelligence (AI) enables machines to exhibit human-like intelligence and decision-making capabilities.",
        
        "what is augmented reality?" => "Augmented reality (AR) adds digital information to the real-world environment.",
        "what is virtual reality?" => "Virtual reality (VR) creates a simulated environment that provides an immersive experience for users.",
        "what is quantum computing?" => "Quantum computing is an advanced technology that uses the principles of quantum mechanics for complex calculations.",
            
        // ** General Knowledge & Facts **
        "what are the seven wonders of the world?" => "The seven wonders of the world include the Great Wall of China, Petra, Christ the Redeemer, Colosseum, Chichen Itza, Machu Picchu, and the Taj Mahal.",
        "what is the longest river?" => "The longest river is the Nile, but some also consider the Amazon.",
        "what is the tallest mountain?" => "Mount Everest is the tallest mountain in the world.",
        "who invented the telephone?" => "The telephone was invented by Alexander Graham Bell.",
        "who is the current president of the USA?" => "The current president is Joe Biden. (Update in 2024.)",
        
        "what is a training needs assessment" => "A training needs assessment is a process for identifying the training requirements of employees.",
        "what is a digital marketing funnel" => "A digital marketing funnel is a model that outlines the journey a customer takes from awareness to conversion online.",
        "what is a customer feedback system" => "A customer feedback system is a mechanism for collecting and analyzing customer feedback to improve products or services.",
        "what is a branding strategy" => "A branding strategy is a long-term plan for the development of a successful brand to achieve specific goals.",
        "what is a public relations plan" => "A public relations plan is a strategic document that outlines how an organization will communicate with the public and manage its reputation.",
        "what is a corporate social responsibility (csr) strategy" => "A csr strategy outlines how a company will manage its business processes to produce an overall positive impact on society.",
        "what's the latest news" => "You can check a news website for the latest updates.",
        "who is the current president of usa" => "As of now, Joe Biden is the President of the United States.",
        "what are the latest sports scores" => "You can check a sports news website for the latest scores.",
        "what's happening in the world" => "For global updates, please refer to a reliable news source.",
        "tell me about the latest technology trends" => "Current trends include AI, machine learning, and quantum computing.",
        "what's the latest in entertainment" => "Popular news includes new movie releases and celebrity events.",
        "what are the recent scientific discoveries" => "Recent discoveries include advancements in space exploration and medical research.",
        "who won the latest election" => "You can check news websites for the most recent election results.",
        "what's trending on social media" => "Check social media platforms for trending topics.",
        "what is the capital of india?" => "The capital of India is New Delhi.",
        "what is the national animal of india?" => "The national animal of India is the Bengal tiger.",
        "what is the currency of india?" => "The currency of India is the Indian Rupee (INR).",
        "who is the current prime minister of india?" => "As of now, the Prime Minister of India is Narendra Modi.",
        "what is the national flower of india?" => "The national flower of India is the lotus.",
        "when did india gain independence?" => "India gained independence from British rule on August 15, 1947.",
        "what are the major religions in india?" => "The major religions in India include Hinduism, Islam, Christianity, Sikhism, Buddhism, and Jainism.",
        "what is the national language of india?" => "India does not have a national language, but Hindi is the most widely spoken language, and English is also extensively used.",
        "which is the largest state in india?" => "Rajasthan is the largest state in India by area.",
        "what is the indian national anthem?" => "The Indian national anthem is 'Jana Gana Mana,' written by Rabindranath Tagore.",
        "who is known as the father of the nation in india?" => "Mahatma Gandhi is known as the Father of the Nation in India.",
        "what is the official emblem of india?" => "The official emblem of India features four lions standing back to back, symbolizing power, courage, and confidence.",
        "what is the longest river in india?" => "The Ganges is the longest river in India.",
        "what is the national sport of india?" => "The national sport of India is field hockey.",
        "what are the famous festivals celebrated in india?" => "Some famous festivals in India include Diwali, Holi, Eid, Christmas, and Pongal.",
        "what is the significance of the taj mahal?" => "The Taj Mahal is a UNESCO World Heritage Site and a symbol of love, built by Mughal Emperor Shah Jahan in memory of his wife Mumtaz Mahal.",
        "what is ayurveda?" => "Ayurveda is an ancient system of medicine that originated in India, focusing on holistic health and wellness.",
        "which is the largest city in india?" => "Mumbai is the largest city in India by population.",
        "what is the indian independence movement?" => "The Indian independence movement was a series of activities aimed at ending British rule in India, culminating in independence in 1947.",
        "what are the popular cuisines of india?" => "Popular Indian cuisines include North Indian, South Indian, Bengali, Punjabi, and Gujarati dishes, known for their rich flavors and variety.",
        "what are the current economic trends" => "The latest trends include inflation rates and job market statistics.",
        "what is the capital of france" => "The capital of France is Paris.",
        "who wrote 'romeo and juliet'?" => "William Shakespeare wrote 'Romeo and Juliet.'",
        "what is the largest planet in our solar system?" => "The largest planet in our solar system is Jupiter.",
        "how many continents are there?" => "There are seven continents on Earth.",
        "what is the smallest country in the world?" => "The smallest country in the world is Vatican City.",
        "who painted the mona lisa?" => "The Mona Lisa was painted by Leonardo da Vinci.",
        "what is the boiling point of water?" => "The boiling point of water is 100 degrees Celsius at sea level.",
        "what is the currency of japan?" => "The currency of Japan is the Japanese Yen.",
        "who invented the telephone?" => "Alexander Graham Bell is credited with inventing the telephone.",
        "what is photosynthesis?" => "Photosynthesis is the process by which green plants convert sunlight into energy.",
       "what is ml?" => "ml is a technique where algorithms learn from data without explicit programming.",
       "what are the types of ml?" => "There are three types: supervised learning, unsupervised learning, and reinforcement learning.",
        
    ];

    // Get the user's message and normalize it
    $userMessage = strtolower(trim($_POST['message']));
    
    // Default response if no match is found
    $response = "Sorry, I don't understand that.";
    
    // Search for a matching response
    foreach ($chatData as $key => $value) {
        if (strpos($userMessage, $key) !== false) {
            $response = $value;
            break;
        }
    }

    // Return the response as JSON for the AJAX request
    echo json_encode(["response" => $response]);
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chatbot with Typing Effect</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body {
    margin: 0;
    font-family: 'Arial', sans-serif;
    background: linear-gradient(135deg, #f0f4f8, #d9e7ff);
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-image: url('https://media.istockphoto.com/id/1206801125/photo/hand-touching-digital-chat-bot-for-provide-access-to-information-and-data-in-online-network.jpg?s=612x612&w=0&k=20&c=BkvluJmQ0D1OBb_7oKWvoVMNxHnpWAH6AA6Z6xJ-sMA=');
    background-repeat: no-repeat;
    background-size: cover;


}

/* Chatbox styling */
.chat-box {
    background-color: rgba(255, 255, 255, 0.9); /* Slightly transparent background */
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.2);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    transform: scale(0.95);
    animation: fadeIn 0.5s ease forwards;
    width: 500px;
}

/* Chatbox hover effect */
.chat-box:hover {
    transform: scale(1);
    box-shadow: 0px 15px 40px rgba(0, 0, 0, 0.3);
}

/* Fade-in animation */
@keyframes fadeIn {
    from {
        opacity: 0;
        transform: scale(0.9);
    }
    to {
        opacity: 1;
        transform: scale(1);
    }
}

.chat-header {
    background-color: #007bff;
    padding: 15px;
    color: white;
    text-align: center;
    font-size: 1.2rem;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
    animation: slideDown 0.6s ease;
}

/* Slide-down animation */
@keyframes slideDown {
    from {
        transform: translateY(-100%);
        opacity: 0;
    }
    to {
        transform: translateY(0);
        opacity: 1;
    }
}

.chat-body {
    max-height: 400px;
    overflow-y: auto;
    padding: 20px;
    background-color: #f9f9f9;
    animation: fadeInChatBody 0.6s ease;
}


/* Smooth scroll and scrollbar styling */
.chat-body::-webkit-scrollbar {
    width: 8px;
}

.chat-body::-webkit-scrollbar-thumb {
    background-color: #007bff;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.chat-body::-webkit-scrollbar-thumb:hover {
    background-color: #0056b3;
}

@keyframes fadeInChatBody {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}

.chat-footer {
    display: flex;
    padding: 10px;
    background-color: #f1f1f1;
    animation: slideUp 0.6s ease;
    transition: background-color 0.3s ease;
}

/* Slide-up animation */
@keyframes slideUp {
    from {
        transform: translateY(100%);
        opacity: 0;
    }
    to {
        transform: translateY(0);
        opacity: 1;
    }
}

.chat-footer:hover {
    background-color: #e0e0e0;
}

.chat-footer input {
    flex: 1;
    margin-right: 10px;
    padding: 10px;
    border-radius: 20px;
    border: 1px solid #ccc;
    transition: box-shadow 0.3s ease;
}

/* Input shadow effect on focus */
.chat-footer input:focus {
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    outline: none;
}

.chat-footer button {
    background-color: #007bff;
    color: white;
    border: none;
    padding: 10px 15px;
    border-radius: 20px;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.3s ease;
}

.chat-footer button:hover {
    background-color: #0056b3;
    transform: scale(1.05);
}


.message {
            margin-bottom: 15px;
            padding: 10px;
            border-radius: 10px;
        }

        .user-message {
            background-color: #007bff;
            color: white;
            text-align: right;
            margin-left: 50px;
        }

        .bot-message {
            background-color: #e9e9e9;
            color: #333;
            margin-right: 50px;
        }

        /* Typing indicator styling */
        .typing-indicator {
            color: #999;
            font-style: italic;
        }
    </style>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="chat-box">
            <div class="chat-header">
                <h3>Chatbot</h3>
            </div>
            <div class="chat-body" id="chatBody">
                <div class="message bot-message">
                    Hello! How can I assist you today?
                </div>
            </div>
            <div class="chat-footer">
                <input type="text" id="userMessage" class="form-control" placeholder="Type your message...">
                <button class="btn btn-primary" id="sendMessage">Send</button>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#sendMessage').click(function() {
                var userMessage = $('#userMessage').val().trim();
                if (userMessage !== '') {
                    // Append the user's message to the chat body
                    $('#chatBody').append('<div class="message user-message">' + userMessage + '</div>');
                    $('#userMessage').val('');  // Clear the input box

                    // Show typing indicator
                    var typingIndicator = '<div class="message bot-message typing-indicator" id="typing">Chatbot is typing...</div>';
                    $('#chatBody').append(typingIndicator);

                    // Send the user's message to the PHP backend using AJAX
                    $.ajax({
                        url: '', // Current file (index.php) will handle the AJAX
                        type: 'POST',
                        dataType: 'json',
                        data: { message: userMessage },
                        success: function(data) {
                            // Remove typing indicator before showing the bot response
                            $('#typing').remove();

                            // Simulate a typing effect for the bot's message
                            var botResponse = data.response;
                            var typingSpeed = 50; // Speed in milliseconds for each character
                            var currentChar = 0;
                            var messageContainer = $('<div class="message bot-message"></div>');
                            $('#chatBody').append(messageContainer);

                            // Typing effect function
                            function typeEffect() {
                                if (currentChar < botResponse.length) {
                                    messageContainer.append(botResponse.charAt(currentChar));
                                    currentChar++;
                                    setTimeout(typeEffect, typingSpeed);
                                }
                            }
                            typeEffect(); // Start typing effect
                        },
                        error: function() {
                            $('#typing').remove(); // Remove typing indicator in case of error
                            $('#chatBody').append('<div class="message bot-message">Oops! Something went wrong.</div>');
                        }
                    });
                }
            });

            // Allow sending message by pressing Enter key
            $('#userMessage').keypress(function(e) {
                if (e.which == 13) {
                    $('#sendMessage').click();
                }
            });
        });
    </script>
</body>
</html>
