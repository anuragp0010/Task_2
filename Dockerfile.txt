FROM centos:latest

RUN yum install wget -y
RUN yum install net-tools -y
RUN wget -O /etc/yum.repos.d/jenkins.repo http://pkg.jenkins.io/redhat/jenkins.repo
RUN rpm --import http://pkg.jenkins.io/redhat/jenkins.io.key
RUN yum install jenkins -y
RUN yum install java-11-openjdk.x86_64 -y
RUN yum install git -y
RUN echo "jenkins ALL=(ALL) NOPASSWD" >> /etc/sudoers
RUN yum install python3 -y

COPY mail.py /

CMD java -jar /usr/lib/jenkins/jenkins.war